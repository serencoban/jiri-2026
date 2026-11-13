<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(6);

        return view('pages.admin.projets.index', compact('projects'));
    }
}
