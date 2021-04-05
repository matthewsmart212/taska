<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/projects',[ProjectController::class,'index']);
Route::get('/projects/create',[ProjectController::class,'create']);
Route::post('/projects',[ProjectController::class,'store']);
Route::get('/projects/{project}',[ProjectController::class,'show']);
Route::get('/projects/{project}/edit',[ProjectController::class,'edit']);
Route::put('/projects/{project}',[ProjectController::class,'update']);
Route::delete('/projects/{project}',[ProjectController::class,'destroy']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
