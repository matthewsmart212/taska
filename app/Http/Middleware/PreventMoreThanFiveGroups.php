<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Project;

class PreventMoreThanFiveGroups
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $project = Project::find($request['project_id']);

        if($project->groups->count() == 5){
            return back()->with('errors','You already have 5 groups for this project');
        }

        return $next($request);
    }
}
