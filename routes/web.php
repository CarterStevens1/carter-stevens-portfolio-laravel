<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('carterStevens');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('adminPanel', [LoginController::class, 'create'])->name('login');
    Route::post('adminPanel', [LoginController::class, 'store'])->name('login');
});

Route::get('edit', [RegisteredUserController::class, 'edit'])->middleware('auth')->name('edit');
Route::post('edit', [RegisteredUserController::class, 'update'])->middleware('auth')->name('update');
Route::post('destroy', [RegisteredUserController::class, 'destroy'])->middleware('auth')->name('destroy');


Route::middleware('auth')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
    Route::get('dashboard', [RegisteredUserController::class, 'index'])->name('dashboard');
});

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
