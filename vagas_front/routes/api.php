<?php 

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);