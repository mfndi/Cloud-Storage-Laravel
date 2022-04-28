<?php
// {{-- 
//     ############################
//     #Jangan Hilangkan Copyright :) 
//     #Author : Efendi (Fecore)
//     ############################
// --}}
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdTelegramController;
use App\Providers\ByteForHumanServiceProvider;
use App\Http\Controllers\TelegramFileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);



Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/file-manager', [DashboardController::class, 'fileManager']);
    Route::get('/dashboard/file-manager/upload',  [DashboardController::class, 'viewUpload']);
    Route::get('/dashboard/chat-id', [IdTelegramController::class, 'index']);
    Route::DELETE('/dashboard/file-manager/{telegramfile:random_code_file}', [DashboardController::class, 'fileDestroy']);
    Route::get('/dashboard/file-manager/detail/{telegramfile:file_unique_id}',[DashboardController::class, 'viewDetailFile']);
    Route::get('/dashboard/users', [DashboardController::class, 'users']);
    Route::post('/dashboard/users', [DashboardController::class, 'storeUser']);
    Route::post('/dashboard/users/{users:email}', [DashboardController::class, 'destroyUser']);
    Route::post('/dashboard/file-manager', [TelegramFileController::class, 'storeUpload']);
    Route::post('/dashboard/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard/Webhook', [DashboardController::class, 'viewSetWebhook']); //view page webhook
    Route::get('/dashboard/Webhook/setWebhook', [DashboardController::class, 'setWebhook']); //setting webhook

    Route::post('/dashboard/chat-id/generate', [IdTelegramController::class, 'setChatId']);
    Route::delete('/dashboard/chat-id/{idtelegram:reg_code}', [IdTelegramController::class, 'destroy']);
});

Route::get('/download/file/{telegramfile:file_unique_id}/{file_name}', [TelegramFileController::class, 'downloadFile']); //route Download File