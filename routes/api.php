<?php

use App\Http\Controllers\ChatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('channel-qr/{instance_id?}', [ChatsController::class, 'CreateChannelQR'])->name('create-channel-qr');
Route::post('event-webhook/{instance_id?}', [ChatsController::class, 'EventWebhook'])->name('event-webhook');
