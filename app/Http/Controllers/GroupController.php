<?php

namespace App\Http\Controllers;

use App\Models\Project;

class GroupController extends Controller
{
    public function store(Project $project)
    {
        $project->groups()->create(request()->validate([
            'title'=>'required'
        ]));

        return Redirect($project->path());
    }
}
