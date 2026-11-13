<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('pages.admin.contacts.index', compact('contacts'));
    }
}
