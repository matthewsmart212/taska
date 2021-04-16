<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(Task $task,Request $request)
    {
        $attributes = request()->validate([
            'link'=>'required|mimes:jpeg,jpg,jpe,png,gif,pdf,ppt,pptx,docx,xls,xlsx'
        ]);

        $mime = explode('/',$request->file('link')->getMimeType());

        $attributes['mime'] = $mime[1];
        $attributes['link'] = '/attachments/' . Storage::disk('attachments')->putFile('', $request->file('link'));

        $task->attachments()->create($attributes);

        return Redirect($task->path())->with('status','Attachment successfully added');
    }

    public function update(Project $project,Group $group)
    {
        $group->update(request()->validate(['title'=>'required']));

        return Redirect($project->path());
    }
}
