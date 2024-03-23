<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// User Registration
Route::post('/register', [AuthController::class ,'register']);

// User Login
Route::post('/login', [AuthController::class ,'login']);

// Protected User Routes
Route::middleware('auth:sanctum')->group(function () {
    // Get Authenticated User
    Route::get('/user', [AuthController::class ,'user']);
    // User Logout
    Route::get('/logout', [AuthController::class ,'logout']);
});
