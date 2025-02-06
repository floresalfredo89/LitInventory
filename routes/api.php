<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookFormatController;
use App\Http\Controllers\BookLanguageController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\GenreController;
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

// Authentication routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::apiResource('books',BookController::class);
Route::apiResource('authors',AuthorController::class);
Route::apiResource('genres',GenreController::class);
Route::apiResource('book-types',BookTypeController::class);
Route::apiResource('book-formats',BookFormatController::class);
Route::apiResource('book-languages',BookLanguageController::class);
