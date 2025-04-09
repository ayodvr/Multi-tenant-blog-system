<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\PostController; 
use App\Http\Controllers\AdminPostController; 
use App\Http\Controllers\AdminUserController; 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);

    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/admin/posts', [AdminPostController::class, 'index']);
        Route::get('/admin/pending-users', [AdminUserController::class, 'pending']);
        Route::post('/admin/approve/{id}', [AdminUserController::class, 'approve']);
    });
});
