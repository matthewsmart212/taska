<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Group;

class TaskController extends Controller
{
    public function show(Project $project,Task $task)
    {
        return view('projects.tasks.show',['task'=>$task,'project'=>$project]);
    }

    public function create(Project $project)
    {
        return view('projects.tasks.create',['project'=>$project]);
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

    public function edit(Project $project,Task $task)
    {
        return view('projects.tasks.edit',['task'=>$task,'project'=>$project]);
    }

    public function update(Project $project,Task $task)
    {
        request()->validate([
            'title'=>'required'
        ]);

        $task->update(request()->all());

        return redirect($task->path());
    }

    public function moveTask()
    {
        $task_ids = request('task_ids');

        Task::changeGroupAndOrder($task_ids);

        return 'success';
    }
}
