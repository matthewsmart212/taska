<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['group_id','title','description'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function path()
    {
        return '/projects/'. $this->group->project_id .'/tasks/'. $this->id;
    }

}
