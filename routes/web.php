<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

// ROUTES

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class)->except(['index']);
});