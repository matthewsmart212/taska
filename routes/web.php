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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/projects',[ProjectController::class,'index']);
    Route::get('/projects/create',[ProjectController::class,'create']);
    Route::post('/projects',[ProjectController::class,'store']);
    Route::get('/projects/{project}',[ProjectController::class,'show'])->middleware('can:view,project');
    Route::get('/projects/{project}/edit',[ProjectController::class,'edit']);
    Route::put('/projects/{project}',[ProjectController::class,'update']);
    //Route::delete('/projects/{project}',[ProjectController::class,'destroy']);


    Route::get('/projects/{project}/tasks/create',[TaskController::class,'create']);
    Route::post('/projects/{project}/tasks',[TaskController::class,'store']);
    Route::get('/projects/{project}/tasks/{task}',[TaskController::class,'show']);
    Route::get('/projects/{project}/tasks/{task}/edit',[TaskController::class,'edit']);
    Route::put('/projects/{project}/tasks/{task}',[TaskController::class,'update']);
    Route::post('/move-task-to-a-new-group',[TaskController::class,'moveTask']);
    Route::post('/projects/{project}/groups',[GroupController::class,'store'])->middleware('five.groups.only');


    Route::post('/tasks/{task}/comments',[CommentController::class,'store']);
    Route::put('/tasks/{task}/comments/{comment}',[CommentController::class,'update']);


    Route::get('/teams',[TeamController::class,'index']);
    Route::get('/teams/create',[TeamController::class,'create']);
    Route::post('/teams',[TeamController::class,'store']);
    Route::get('/teams/{team}',[TeamController::class,'show']);
    Route::get('/teams/{team}/edit',[TeamController::class,'edit']);
    Route::put('/teams/{team}',[TeamController::class,'update']);
    Route::post('/teams/{team}/add-user-to-team',[TeamController::class,'addUser']);
    Route::post('/teams/{team}/remove-user-from-team',[TeamController::class,'removeUser']);

    Route::get('/users',[UserController::class,'index']);
});






require __DIR__.'/auth.php';
