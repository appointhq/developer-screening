<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserContoller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/**
 * Default Route - /
 */
Route::get('/', function () {
    return response()->json([
        'version' => '1.0.0',
        'message' => 'Welcome to v1 REST API',
    ], Response::HTTP_OK);
});

// For apps
Route::apiResource('apps', AppController::class)->only(['index', 'show', 'destroy']);
Route::get('/app-user-emails', [AppController::class, 'userEmails']);

// For users
Route::apiResource('users', UserContoller::class)->only(['destroy']);
Route::post('/login', [UserContoller::class, 'login']);

// For tasks
Route::apiResource('tasks', TaskController::class);
