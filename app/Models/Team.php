<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function path()
    {
        return '/teams/'.$this->id;
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
