<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
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

Route::post('login', [AuthController::class, 'login']);

Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index');
    Route::get('/posts/{id}', 'show');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/posts', 'store');
        Route::put('/posts/{id}', 'update');
        Route::delete('/posts/{id}', 'destroy');
    });
});
