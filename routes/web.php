<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});


Route::group(['middleware' => 'auth'], function() {
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
    Route::get('/users/create',[UserController::class,'create']);
    Route::post('/users',[UserController::class,'store']);
    Route::get('/users/{user}',[UserController::class,'show']);
    Route::get('/users/{user}/edit',[UserController::class,'edit']);
    Route::put('/users/{user}/update-password',[UserController::class,'updatePassword']);
    Route::put('/users/{user}',[UserController::class,'update']);


    /*
    |--------------------------------------------------------------------------
    | Routes for task ajax requests
    |--------------------------------------------------------------------------
    */
    Route::post('/move-task-to-a-new-group',[TaskController::class,'moveTask']);

});






require __DIR__.'/auth.php';
