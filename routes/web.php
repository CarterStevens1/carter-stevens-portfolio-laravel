<?php

use App\Http\Controllers\ExperienceController;
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


Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [RegisteredUserController::class, 'index'])->name('dashboard');
    Route::get('add-experience', [ExperienceController::class, 'create'])->name('experience.create');
    Route::post('add-experience', [ExperienceController::class, 'store'])->name('experience.create');

    Route::get('view-experience', [ExperienceController::class, 'index'])->name('experience.index');

    Route::get('/experience/{experience}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
    Route::post('/experience/{experience}/edit', [ExperienceController::class, 'update'])->name('experience.update');
    Route::post('/experience/{experience}/delete', [ExperienceController::class, 'destroy'])->name('experience.destroy');
});

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
