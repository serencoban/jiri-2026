<?php

use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\JiriController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::livewire('/', 'pages::admin.epreuves.index')->name('epreuves');

    Route::livewire('/contacts', 'pages::admin.contacts.index')->name('contacts');

    Route::livewire('/projects', 'pages::admin.projets.index')->name('projects');

    Route::livewire('/profile', 'pages::admin.profile.index')->name('profile');

    Route::livewire('/epreuves/{jiri}', 'pages::admin.epreuves.show')->name('epreuves.show');

    Route::get('/epreuves/students/index', function () {
        return view('pages.admin.epreuves.students.index');
    })->name('students.index');

    Route::get('/epreuves/students/show', function () {
        return view('pages.admin.epreuves.students.show');
    })->name('students.show');

    Route::get('/evaluators', [EvaluatorController::class, 'index'])->name('evaluators');

    Route::get('/evaluators/show', [EvaluatorController::class, 'show'])->name('evaluators.show');

    Route::post('/send-invitation', [InvitationController::class, 'send'])->name('send-invitation');
});
