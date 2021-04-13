<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Group;

class TaskController extends Controller
{
    public function show(Project $project,Task $task)
    {
        return view('projects.show',['task'=>$task,'project'=>$project]);
    }

    public function store(Project $project)
    {
        $attributes = request()->validate([
            'group_id'=>'required','title'=>'required'
        ]);

        $attributes['order'] = Group::find(request('group_id'))->tasks->count() + 1;

        $task = $project->tasks()->create($attributes);

        return redirect($task->path());
    }

    public function updateDescription(Project $project,Task $task)
    {
        $task->update(request()->validate(['description'=>'required']));

        return redirect($task->path());
    }

    public function updateTitle(Project $project,Task $task)
    {
        $task->update(request()->validate(['title'=>'required']));

        return redirect($task->path());
    }

    public function moveTask()
    {
        $task_ids = request('task_ids');

        Task::changeGroupAndOrder($task_ids);

        return 'success';
    }
}
