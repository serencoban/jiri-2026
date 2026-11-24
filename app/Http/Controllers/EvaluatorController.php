<?php

namespace App\Http\Controllers;

class EvaluatorController extends Controller
{
    public function index()
    {
        return view('pages.evaluators.epreuves.index');
    }

    public function show()
    {
        return view('pages.evaluators.epreuves.show');
    }
}
