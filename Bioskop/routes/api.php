<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowtimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/Movie', [MovieController::class,'index']);
Route::get('/Showtime', [ShowtimeController::class,'index']);
Route::post('/Movie', [MovieController::class,'index']);
Route::post('/Showtime', [ShowtimeController::class,'index']);
Route::patch('/Movie', [MovieController::class,'index']);
Route::patch('/Showtime', [ShowtimeController::class,'index']);
Route::delete('/Movie', [MovieController::class,'index']);
Route::delete('/Showtime', [ShowtimeController::class,'index']);

//Untuk autentikasi
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
