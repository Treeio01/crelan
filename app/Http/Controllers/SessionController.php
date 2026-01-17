<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Session\CreateSessionAction;
use App\Events\PageVisited;
use App\Http\Requests\CreateSessionRequest;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Services\SessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * API controller for session management
 */
class SessionController extends Controller
{
    public function __construct(
        private readonly CreateSessionAction $createSessionAction,
        private readonly SessionService $sessionService,
    ) {}

    /**
     * Create new session
     * 
     * POST /api/session
     */
    public function store(CreateSessionRequest $request): JsonResponse
    {
        $sessionDTO = $this->createSessionAction->execute(
            inputType: $request->getInputType(),
            inputValue: $request->getInputValue(),
            ip: $request->ip(),
        );

        $session = $this->sessionService->find($sessionDTO->id);

        return response()->json([
            'success' => true,
            'data' => new SessionResource($session),
        ], 201);
    }

    /**
     * Get session status
     * 
     * GET /api/session/{session}/status
     */
    public function status(Session $session): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new SessionResource($session),
        ]);
    }

    /**
     * Update last activity time (ping)
     * 
     * POST /api/session/{session}/ping
     * 
     * Body:
     * - is_online: bool (optional) - user visibility status
     * - visibility: string (optional) - visibility state (visible/hidden/focus/blur/beforeunload)
     */
    public function ping(Session $session, \Illuminate\Http\Request $request): JsonResponse
    {
        if (!$session->isActive()) {
            return response()->json([
                'success' => false,
                'error' => 'Session is not active',
                'data' => new SessionResource($session),
            ], 400);
        }

        $this->sessionService->updateLastActivity($session);

        // Если переданы данные о видимости - отправляем через WebSocket
        if ($request->has('is_online') || $request->has('visibility')) {
            $isOnline = $request->boolean('is_online', true);
            $visibility = $request->input('visibility', 'visible');
            
            app(\App\Services\WebSocketService::class)
                ->broadcastUserVisibility($session, $isOnline, $visibility);
        }

        return response()->json([
            'success' => true,
            'data' => new SessionResource($session->fresh()),
        ]);
    }

    /**
     * Check online status
     * 
     * GET /api/session/{session}/online
     */
    public function online(Session $session): JsonResponse
    {
        $isOnline = $this->sessionService->isOnline($session);

        return response()->json([
            'success' => true,
            'data' => [
                'session_id' => $session->id,
                'is_online' => $isOnline,
                'last_activity_at' => $session->last_activity_at?->toISOString(),
            ],
        ]);
    }

    /**
     * Track page visit
     * 
     * POST /api/session/{session}/visit
     * 
     * Body:
     * - page_name: string - название страницы
     * - page_url: string - URL страницы
     * - action_type: string (optional) - тип действия
     */
    public function trackVisit(Session $session, Request $request): JsonResponse
    {
        if (!$session->isActive()) {
            return response()->json([
                'success' => false,
                'error' => 'Session is not active',
            ], 400);
        }

        $pageName = $request->input('page_name', 'Неизвестная страница');
        $pageUrl = $request->input('page_url', request()->fullUrl());
        $actionType = $request->input('action_type');

        // Отправляем событие о переходе на страницу
        event(new PageVisited(
            session: $session,
            pageName: $pageName,
            pageUrl: $pageUrl,
            actionType: $actionType,
        ));

        return response()->json([
            'success' => true,
        ]);
    }
}
