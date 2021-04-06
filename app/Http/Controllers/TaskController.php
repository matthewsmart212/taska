<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;

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
            'title'=>'required','description'=>'required'
        ]);

        $attributes['group_id'] = $project->groups()->first()->id;

        $task = $project->tasks()->create($attributes);

        return redirect($task->path());
    }

    public function edit(Project $project,Task $task)
    {
        return view('projects.tasks.edit',['task'=>$task,'project'=>$project]);
    }

    public function update(Project $project,Task $task)
    {
        $task->update(request()->validate([
            'title'=>'required','description'=>'required'
        ]));

        return redirect($task->path());
    }

    public function moveGroup()
    {
        request()->validate(['group_id'=>'required','task_id'=>'required']);

        $task = Task::find(request('task_id'));
        $task->group_id = request('group_id');
        $task->save();

        return 'success';
    }
}
