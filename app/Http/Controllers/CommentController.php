<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Task $task)
    {
        $attributes = request()->validate([
            'comment'=>'required'
        ]);
        $attributes['task_id'] = $task->id;
        $attributes['user_id'] = auth()->id();

        Comment::create($attributes);

        return redirect($task->path());
    }
}
