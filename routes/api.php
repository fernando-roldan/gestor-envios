<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    //Authenticater Controller
    Route::post('/login', [AuthController::class, 'login'])->name('login.api');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me')->name('me');
    //Route::post('/register', [AuthController::class, 'register'])->name('register');

});
