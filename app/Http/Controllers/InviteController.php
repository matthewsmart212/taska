<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\Invite;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InviteController extends Controller
{
    public function process(Request $request)
    {
        // validate the incoming request data

        do {
            //generate a random string using Laravel's str_random helper
            $token = Str::random();
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());

        //create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token
        ]);

        // send the email
        Mail::to($request->get('email'))->send(new InviteCreated($invite));


        // redirect back where we came from
        return redirect()
            ->back()->with('status','User has been invited');
    }

    public function accept($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // delete the invite so it can't be used again
        $invite->delete();

        return view('auth.invited-user',['email'=>$invite->email]);
    }

    public function setUp()
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8'
        ]);

        Auth::login($user = User::create([
            'name'=>$attributes['name'],
            'role_id'=>3,
            'email'=>$attributes['email'],
            'email_verified_at'=>Carbon::now()->toDateTimeString(),
            'password'=>Hash::make($attributes['password']),
            'created_at'=>Carbon::now()->toDateTimeString()
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
