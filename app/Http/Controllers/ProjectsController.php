<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store()
    {

        //validate
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        //$attributes['owner_id'] = auth()->id();

        auth()->user()->projects()->create($attributes);

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        //$project = Project::FindOrFail(request('project'));

        return view('projects.show', compact('project'));
    }
}
