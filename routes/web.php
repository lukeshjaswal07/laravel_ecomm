<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\WebController;

Route::get('/', function () {

    return view('auth.login');

});

Route::get('/home', function () {

    return view('welcome');

});

Route::get('/login', function () {

    return view('auth.login');

});

Route::get('/register', function () {

    return view('auth.register');

});

Route::get('/dashboard',[AuthController::class,"dashboard"]);

Route::post('/register',[AuthController::class,"register"]);

Route::post('/login',[AuthController::class,"login"]);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/view-product/{id}',[WebController::class,"view_product"]);