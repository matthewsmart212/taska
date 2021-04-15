<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',['users'=>User::where('role_id','!=','1')->get()]);
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('users.show',['user'=>$user,'roles'=>$roles]);
    }

    public function edit(User $user)
    {
        return view('users.edit',['user'=>$user,'roles'=>Role::all()]);
    }

    public function update(User $user,Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role_id'=>'required',
            'avatar' => 'file'
        ]);

        $currentAvatar = explode('/',$user->avatar());

        if(request('avatar')){
            if($currentAvatar[1] !== 'images'){
                Storage::disk('public')->delete($currentAvatar[2]);
            }
            $attributes['avatar'] = '/uploads/' . Storage::disk('public')->putFile('', $request->file('avatar'));
        }

        $user->update($attributes);

        return redirect('/users/'.$user->id)->with('status','User successfully updated!');
    }

    public function updatePassword(User $user)
    {
        $attributes = request()->validate(['password'=>'required|confirmed|min:6']);

        $user->update([
            'password'=> Hash::make($attributes['password']),
        ]);

        return Redirect($user->path());
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('status','User Successfully deleted.');
    }
}
