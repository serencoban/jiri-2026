<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('pages.admin.epreuves.index');
    })->name('epreuves');

    Route::get('/contacts', function () {
        return view('pages.admin.contacts.index');
    })->name('contacts');

    Route::get('/projects', function () {
        return view('pages.admin.projets.index');
    })->name('projects');

    Route::get('/epreuves/show', function () {
        return view('pages.admin.epreuves.show');
    })->name('epreuves.show');

    Route::get('/epreuves/students/index', function () {
        return view('pages.admin.epreuves.students.index');
    })->name('students.index');

    Route::get('/epreuves/students/show', function () {
        return view('pages.admin.epreuves.students.show');
    })->name('students.show');

    Route::get('/evaluators', function () {
        return view('pages.evaluators.epreuves.index');
    })->name('evaluators');

    Route::get('/evaluators/show', function () {
        return view('pages.evaluators.epreuves.show');
    })->name('evaluators.show');

    Route::get('profile', function(){
        return view('pages.admin.profile.index');
    })->name('profile');

});
