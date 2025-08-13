<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\Experience;
use App\Models\Projects;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Get all experiences
    $experiences = Experience::latest()->get();
    // Check if personal project get all if true 
    $personalProjects = Projects::where('is_personal_project', true)->get();
    $notPersonalProjects = Projects::where('is_personal_project', false)->get();

    return view('carterStevens', compact(['experiences', 'notPersonalProjects', 'personalProjects']));
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

    Route::get('add-project', [ProjectsController::class, 'create'])->name('project.create');
    Route::post('add-project', [ProjectsController::class, 'store'])->name('project.create');
    Route::get('view-project', [ProjectsController::class, 'index'])->name('project.index');
    Route::get('/project/{project}/edit', [ProjectsController::class, 'edit'])->name('project.edit');
    Route::post('/project/{project}/edit', [ProjectsController::class, 'update'])->name('project.update');
    Route::post('/project/{project}/delete', [ProjectsController::class, 'destroy'])->name('project.destroy');
});

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
