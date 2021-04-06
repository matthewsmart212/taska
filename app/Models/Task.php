<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function path()
    {
        return '/projects/'. $this->project->id .'/tasks/'. $this->id;
    }
}