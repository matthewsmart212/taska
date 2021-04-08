<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;

class TeamController extends Controller
{
    public function index()
    {
        return view('teams/index',[
            'teams'=>Team::all()
        ]);
    }

    public function show(Team $team)
    {
        $users = User::whereNotIn('id',
            $team->users()->pluck('id')->toArray()
        )->get();

        return view('teams.show',['team'=>$team,'users'=>$users]);
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store()
    {

        $team = auth()->user()->teams()->create(request()->validate(
            ['title'=>'required']
        ));

        return redirect($team->path());
    }

    public function edit(Team $team)
    {
        return view('teams.edit',['team'=>$team]);
    }

    public function update(Team $team)
    {
        $team->update(request()->validate(
            ['title'=>'required']
        ));

        return redirect($team->path());
    }

    public function addUser(Team $team)
    {
        $attributes = request()->validate(['user_id'=>'required']);

        $team->users()->attach($attributes['user_id']);

        return redirect($team->path());
    }

    public function removeUser(Team $team)
    {
        $attributes = request()->validate(['user_id'=>'required']);

        $team->users()->detach($attributes['user_id']);

        return redirect($team->path());
    }
}
