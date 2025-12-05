<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/course', function () {
    return view('course');
});

// LOGIN ROUTE YANG BENAR
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

// LOGOUT
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // balik ke welcome
});