<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function show()
    {
        $user = User::find(auth()->id());

        return view('profiles.show',['user'=>$user]);
    }

    public function update(User $user,Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
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

        return redirect('/profile')->with('status','Profile updated!');
    }
}
