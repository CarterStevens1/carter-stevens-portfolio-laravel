<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PastReadingsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\Experience;
use App\Models\PastReadings;
use App\Models\Projects;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Get all experiences
    $experiences = Experience::orderByRaw('end_date = "present" DESC')->orderBy('start_date', 'desc')->get();
    // Check if personal project get all if true 
    $personalProjects = Projects::where('is_personal_project', '1')->get();
    $notPersonalProjects = Projects::where('is_personal_project', '0')->get();
    $pastReadings = PastReadings::orderBy('read_date', 'desc')->get();

    return view('carterStevens', compact(['experiences', 'notPersonalProjects', 'personalProjects', 'pastReadings']));
})->name('home');

Route::get('/hobbies', [GamesController::class, 'index'])->name('hobbies');

// Route::get('/hobbies', function () {
//     // Get all experiences
//     $experiences = Experience::orderByRaw('end_date = "present" DESC')->orderBy('start_date', 'desc')->get();
//     // Check if personal project get all if true 
//     $personalProjects = Projects::where('is_personal_project', '1')->get();
//     $notPersonalProjects = Projects::where('is_personal_project', '0')->get();
//     $pastReadings = PastReadings::orderBy('read_date', 'desc')->get();

//     return view('hobbies', compact(['experiences', 'notPersonalProjects', 'personalProjects', 'pastReadings']));
// })->name('hobbies');

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


    Route::controller(ExperienceController::class)->group(function () {
        Route::get('add-experience', 'create')->name('experience.create');
        Route::post('add-experience', 'store')->name('experience.create');
        Route::get('view-experience', 'index')->name('experience.index');
        Route::get('/experience/{experience}/edit', 'edit')->name('experience.edit');
        Route::post('/experience/{experience}/edit', 'update')->name('experience.update');
        Route::post('/experience/{experience}/delete', 'destroy')->name('experience.destroy');
    });

    Route::controller(ProjectsController::class)->group(function () {
        Route::get('add-project', 'create')->name('project.create');
        Route::post('add-project', 'store')->name('project.create');
        Route::get('view-project', 'index')->name('project.index');
        Route::get('/project/{project}/edit', 'edit')->name('project.edit');
        Route::post('/project/{project}/edit', 'update')->name('project.update');
        Route::post('/project/{project}/delete', 'destroy')->name('project.destroy');
    });

    Route::controller(PastReadingsController::class)->group(function () {
        Route::get('add-reading', 'create')->name('pastReading.create');
        Route::post('add-reading', 'store')->name('pastReading.create');
        Route::get('view-reading', 'index')->name('pastReading.index');
        Route::get('/reading/{reading}/edit', 'edit')->name('pastReading.edit');
        Route::post('/reading/{reading}/edit', 'update')->name('pastReading.update');
        Route::post('/reading/{reading}/delete', 'destroy')->name('pastReading.destroy');
    });

    Route::get('/games/search-ids', [GamesController::class, 'searchGameIds'])->name('games.search-ids');
});

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
