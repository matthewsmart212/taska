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
        $project = auth()->user()->projects()->create(request()->validate(
            ['title'=>'required','description'=>'required']
        ));

        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('projects.edit',['project'=>$project]);
    }

    public function update()
    {
        $project = auth()->user()->projects()->update(request()->validate(
            ['title'=>'required','description'=>'required']
        ));

        return redirect($project->path());
    }
}
