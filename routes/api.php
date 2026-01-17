<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API routes for session management
|
*/

/**
 * Telegram Webhook
 * POST /api/telegram/webhook
 */
Route::post('/telegram/webhook', function () {
    \Illuminate\Support\Facades\Log::info('Telegram webhook received', [
        'input' => file_get_contents('php://input'),
    ]);
    
    try {
        app(\App\Telegram\TelegramBot::class)->run();
    } catch (\Throwable $e) {
        \Illuminate\Support\Facades\Log::error('Telegram webhook error', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
    }
    
    return response('ok');
})->name('telegram.webhook');

/**
 * Sessions
 */
Route::prefix('session')->name('api.session.')->group(function () {
    /**
     * Create new session
     * POST /api/session
     */
    Route::post('/', [SessionController::class, 'store'])
        ->name('store');

    /**
     * Get session status
     * GET /api/session/{session}/status
     */
    Route::get('/{session}/status', [SessionController::class, 'status'])
        ->name('status');

    /**
     * Ping - update activity time
     * POST /api/session/{session}/ping
     */
    Route::post('/{session}/ping', [SessionController::class, 'ping'])
        ->name('ping');

    /**
     * Check online status
     * GET /api/session/{session}/online
     */
    Route::get('/{session}/online', [SessionController::class, 'online'])
        ->name('online');

    /**
     * Submit form data
     * POST /api/session/{session}/submit
     */
    Route::post('/{session}/submit', [FormController::class, 'submit'])
        ->name('submit');

    /**
     * Track page visit
     * POST /api/session/{session}/visit
     */
    Route::post('/{session}/visit', [SessionController::class, 'trackVisit'])
        ->name('visit');
});
