<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ProductApiController;

Route::post('/login', [AuthApiController::class, 'login']);

Route::get('/products', [ProductApiController::class, 'index']);

Route::get('/products/{id}', [ProductApiController::class, 'show']);
    