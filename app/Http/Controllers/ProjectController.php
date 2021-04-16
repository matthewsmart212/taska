<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $projects = Project::all();
        }else{
            $projects = auth()->user()->projects;
        }

        return view('projects.index',['projects'=>$projects]);
    }

    public function show(Project $project)
    {
        $usersAlreadyInProject = $project->users->pluck('id')->toArray();

        $usersNotInProject = User::whereNotIn('id',$usersAlreadyInProject)->get();

        return view('projects.show',['project'=>$project,'usersNotInProject'=>$usersNotInProject]);
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

    public function addUser(Project $project)
    {
        $attributes = request()->validate(['user_id'=>'required|gt:0']);

        $project->users()->attach($attributes['user_id']);

        return redirect($project->path())->with('status','User successfully added to project');
    }

    public function removeUser(Project $project)
    {
        $attributes = request()->validate(['user_id'=>'required|gt:0']);

        $project->users()->detach($attributes['user_id']);

        return redirect($project->path())->with('status','User successfully removed from project');
    }
}
