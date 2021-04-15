<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index',['projects'=>$projects]);
    }

    public function show(Project $project)
    {
        return view('projects.show',['project'=>$project]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title'=>'required|unique:projects',
            'background_image'=>'required'
        ]);

        $attributes['background_image'] = '/images/backgrounds/' . request('background_image') . '.jpg';

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'title'=>[
                'required',
                Rule::unique('projects')->ignore($project->title,'title')
            ],
            'background_image'=>'required'
        ]);

        $attributes['background_image'] = '/images/backgrounds/' . request('background_image') . '.jpg';

        $project->update($attributes);

        return redirect($project->path());
    }
}
