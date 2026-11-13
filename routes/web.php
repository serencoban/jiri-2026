<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JiriController;
use App\Http\Controllers\ProjectController;
use App\Mail\Invitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [JiriController::class, 'index'])->name('epreuves');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/epreuves/{jiri}', [JiriController::class, 'show'])->name('epreuves.show');

    Route::get('/epreuves/students/index', function () {
        return view('pages.admin.epreuves.students.index');
    })->name('students.index');

    Route::get('/epreuves/students/show', function () {
        return view('pages.admin.epreuves.students.show');
    })->name('students.show');

    Route::get('/profile', function () {
        return view('pages.admin.profile.index');
    })->name('profile');

    Route::get('/evaluators', function () {
        return view('pages.evaluators.epreuves.index');
    })->name('evaluators');

    Route::get('/evaluators/show', function () {
        return view('pages.evaluators.epreuves.show');
    })->name('evaluators.show');

    Route::post('/send-invitation', function () {
        $invitationToSend = \App\Models\Invitation::latest()->first();
        Mail::to('s@c.com')->queue(new Invitation($invitationToSend));
        return 'L’invitation a été mise dans la file d’attente';
    })->name('send-invitation');
});
