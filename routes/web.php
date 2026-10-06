<?php

use Illuminate\Support\Facades\Route;


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

