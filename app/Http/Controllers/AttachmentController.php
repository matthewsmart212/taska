<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Group;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(Task $task,Request $request)
    {
        if(Attachment::hasValidFileType($request))
        {
            $attributes['mime'] = $request->file('link')->getClientOriginalExtension();
            $attributes['name'] = $request->file('link')->getClientOriginalName();
            $attributes['link'] = '/attachments/' . Storage::disk('attachments')->putFile('', $request->file('link'));
            $task->attachments()->create($attributes);

            return Redirect($task->path())->with('status','Attachment successfully added');
        }else{
            return Redirect($task->path())->with('status','Sorry, we do not allow this file type to be uploaded');
        }
    }

    public function update(Project $project,Group $group)
    {
        $group->update(request()->validate(['title'=>'required']));

        return Redirect($project->path());
    }

    public function destroy(Attachment $attachment,Task $task)
    {
        $attachment->delete();

        return redirect($task->path())->with('status','Attachment Successfully deleted.');
    }
}
