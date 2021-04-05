<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index',['projects'=>$projects]);
    }

    public function show(Project $project)
    {
        return view('projects.show',['project'=>$project]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate(['title'=>'required','description'=>'required']);

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    public function edit()
    {
        return view('profiles.create');
    }

    public function update()
    {
        return view('profiles.create');
    }
}
