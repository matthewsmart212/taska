<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Group;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('landing-pages.tenant');
    }
}
