<?php

namespace App\Http\Controllers;
use App\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterCompanyController extends Controller
{
    protected $attributes = [];

    public function store()
    {
        $this->attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:8',
            'company_name'=>'required'
        ]);

        $id = $this->slugify(request('company_name'));
        $domain = $id .'.localhost';

        $tenant = Tenant::create(['id' => $id]);
        $tenant->domains()->create(['domain' => $domain]);

        $tenant->run(function () {
            User::create([
                'name'=>$this->attributes['name'],
                'role_id'=>1,//Admin
                'email'=>$this->attributes['email'],
                'password'=>Hash::make($this->attributes['password'])
            ]);
        });

        return redirect('http://'.$domain);
    }

    function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }
}
