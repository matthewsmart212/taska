<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['group_id','order','title','description'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function path()
    {
        return '/projects/'. $this->group->project_id .'/tasks/'. $this->id;
    }

    public static function changeGroupAndOrder($task_ids)
    {
        $count = 1;
        foreach($task_ids as $id){
            $task = Task::find($id);
            $task->group_id = request('group_id');
            $task->order = $count;
            $task->save();
            $count++;
        }
    }

}
