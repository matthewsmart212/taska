<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{

    public function show()
    {
        $user = User::find(auth()->id());

        return view('profiles.show',['user'=>$user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'avatar' => 'file'
        ]);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect('/profile')->with('status','Profile updated!');
    }
}
