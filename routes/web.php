<?php

use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        $jiris = Jiri::paginate(10);
        return view('pages.admin.epreuves.index', compact('jiris'));
    })->name('epreuves');

    Route::get('/contacts', function () {
        $contacts = Contact::paginate(10);
        return view('pages.admin.contacts.index',compact('contacts'));
    })->name('contacts');

    Route::get('/projects', function () {
        $projects = Project::paginate(6);
        return view('pages.admin.projets.index', compact('projects'));
    })->name('projects');

    Route::get('/epreuves/{jiri}', function (Jiri $jiri) {
        $jiri->load('projects.tasks');
        return view('pages.admin.epreuves.show', compact('jiri'));
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

    Route::post('/send-invitation', function () {
        $invitationToSend = \App\Models\Invitation::latest()->first();
        Mail::to('s@c.com')->queue(new \App\Mail\Invitation($invitationToSend));
        return 'L’invitation a été mise dans la file d’attente';
    })->name('send-invitation');

});
