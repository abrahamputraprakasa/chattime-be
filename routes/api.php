<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [UserController::class, 'login']);

//protected routes
Route::group(['prefix' => 'room', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/get', [RoomController::class, 'get']);
    Route::post('/create', [RoomController::class, 'create']);
    Route::post('/delete', [RoomController::class, 'delete']);
});



Route::group(['prefix' => 'chat', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/send', [ChatController::class, 'sendMessage']);
});





