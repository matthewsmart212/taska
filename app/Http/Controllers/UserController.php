<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',['users'=>User::all()]);
    }

    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }

    public function create()
    {
        return view('users.create',['roles'=>Role::orderBy('role', 'desc')->get()]);
    }

    public function store()
    {
        $attributes = request()->validate(
            ['name'=>'required','email'=>'required','role_id'=>'required','password'=>'required|min:6|confirmed']
        );

        $user = User::create([
            'name'=>$attributes['name'],
            'role_id'=>$attributes['role_id'],
            'email'=>$attributes['email'],
            'password'=>Hash::make($attributes['password']),
        ]);

        return redirect($user->path());
    }

    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user,'roles'=>Role::all()]);
    }

    public function update(User $user)
    {
        $user->update(request()->validate(
            ['name'=>'required','email'=>'required','role_id'=>'required']
        ));

        return redirect($user->path());
    }

    public function updatePassword(User $user)
    {
        $attributes = request()->validate(['password'=>'required|confirmed|min:6']);

        $user->update([
            'password'=> Hash::make($attributes['password']),
        ]);

        return Redirect($user->path());
    }
}
