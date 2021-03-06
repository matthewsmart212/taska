<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','background_image'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function path()
    {
        return '/projects/'.$this->id;
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class,Group::class);
    }
}
