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



    public function create(){}
    public function store(){}
    public function show(){}
    public function edit(){}
    public function update(){}
}
