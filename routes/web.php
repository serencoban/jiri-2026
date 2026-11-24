<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\JiriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [JiriController::class, 'index'])->name('epreuves');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

    Route::get('/epreuves/students/index', function () {
        return view('pages.admin.epreuves.students.index');
    })->name('students.index');

    Route::get('/epreuves/students/show', function () {
        return view('pages.admin.epreuves.students.show');
    })->name('students.show');

    Route::get('/epreuves/{jiri}', [JiriController::class, 'show'])->name('epreuves.show');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/evaluators', [EvaluatorController::class, 'index'])->name('evaluators');

    Route::get('/evaluators/show', [EvaluatorController::class, 'show'])->name('evaluators.show');

    Route::post('/send-invitation', [InvitationController::class, 'send'])->name('send-invitation');
});
