<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Group;

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
