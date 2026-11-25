<?php

namespace App\Http\Controllers;

use App\Models\Jiri;

class JiriController extends Controller
{
    public function index()
    {
        $jiris = auth()->user()->jiris()->paginate(10);

        return view('pages.admin.epreuves.index', compact('jiris'));
    }

    public function show(Jiri $jiri)
    {
        $jiri->load([
            'evaluated',
            'evaluators',
            'projects.tasks',
        ]);

        return view('pages.admin.epreuves.show', compact('jiri'));
    }

    public function destroy(Jiri $jiri)
    {
        $jiri->delete();
        return redirect('/')->with('success', 'Jiri deleted!');
    }
}
