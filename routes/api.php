<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/prueba', function () {
        return response([
            'message' => 'Saludos desde /prueba'
        ], 200);
    });

    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/logout_all',[AuthController::class,'logoutAll']);
});

/* Authentication routes */
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
