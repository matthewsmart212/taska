<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/



Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class

])->group(function () {

    Route::middleware(['auth','verified'])->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Routes for Dashboard
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Routes for projects
        |--------------------------------------------------------------------------
        */
        Route::get('/projects',[ProjectController::class,'index']);
        Route::post('/projects',[ProjectController::class,'store'])->middleware('can:create,App\Models\Project');
        Route::get('/projects/{project}',[ProjectController::class,'show'])->middleware('can:view,project');
        Route::put('/projects/{project}',[ProjectController::class,'update'])->middleware('can:update,App\Models\Project');

        /*
        |--------------------------------------------------------------------------
        | Routes for Tasks
        |--------------------------------------------------------------------------
        */
        Route::post('/projects/{project}/tasks',[TaskController::class,'store']);
        Route::get('/projects/{project}/tasks/{task}',[TaskController::class,'show']);
        Route::put('/projects/{project}/tasks/{task}/description',[TaskController::class,'updateDescription']);
        Route::put('/projects/{project}/tasks/{task}/title',[TaskController::class,'updateTitle']);

        /*
        |--------------------------------------------------------------------------
        | Routes for Groups
        |--------------------------------------------------------------------------
        */
        Route::post('/projects/{project}/groups',[GroupController::class,'store'])->middleware('five.groups.only');
        Route::post('/projects/{project}/groups/{group}',[GroupController::class,'update']);

        /*
        |--------------------------------------------------------------------------
        | Routes for comments
        |--------------------------------------------------------------------------
        */
        Route::post('/tasks/{task}/comments',[CommentController::class,'store']);
        Route::put('/tasks/{task}/comments/{comment}',[CommentController::class,'update']);

        /*
        |--------------------------------------------------------------------------
        | Routes for users
        |--------------------------------------------------------------------------
        */
        Route::get('/users',[UserController::class,'index']);
        Route::get('/users/{user}',[UserController::class,'show']);
        Route::put('/users/{user}',[UserController::class,'update']);
        Route::delete('/users/{user}', [UserController::class,'destroy']);

        /*
        |--------------------------------------------------------------------------
        | Routes for profile
        |--------------------------------------------------------------------------
        */
        Route::get('/profile',[ProfileController::class,'show']);
        Route::post('/profile/{user}',[ProfileController::class,'update']);

        /*
        |--------------------------------------------------------------------------
        | Routes for task ajax requests
        |--------------------------------------------------------------------------
        */
        Route::post('/move-task-to-a-new-group',[TaskController::class,'moveTask']);
    });


    Route::post('/set-up',[InviteController::class,'setUp']);
    Route::get('invite', [InviteController::class,'invite'])->name('invite');
    Route::post('invite', [InviteController::class,'process'])->name('process');
    Route::get('accept/{token}', [InviteController::class,'accept'])->name('accept');





    Route::get('/welcome',[WelcomeController::class,'welcome']);

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/dashboard');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    //Auth::routes(['verify' => true]);
    require __DIR__.'/auth.php';
});
