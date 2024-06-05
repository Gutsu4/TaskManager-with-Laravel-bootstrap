<?php


use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

if (env('APP_ENV') == 'production') {
    \Illuminate\Support\Facades\URL::forceScheme('https');
}

Route::get('/',[LoginController::class,'index'])->name('show');

Route::post('login',[LoginController::class,'login'])->name('login');

Route::get('home',[UserController::class,'home'])->name('user.home');

Route::get('create',[UserController::class,'create'])->name('user.create');

Route::post('create',[UserController::class,'store'])->name('user.store');

Route::get('createTask',[TaskController::class,'create'])->name('task.create');

Route::post('createTask',[TaskController::class,'store'])->name('task.store');

Route::post('taskDelete/{id}',[TaskController::class,'delete'])->name('task.delete');

Route::post('taskDone/{id}',[TaskController::class,'done'])->name('task.done');

Route::get('taskAlreadyDone/',[TaskController::class,'alreadyDone'])->name('task.already.done');

Route::post('taskReset/',[TaskController::class,'reset'])->name('task.reset');

Route::get('taskEdit/{id}',[TaskController::class,'edit'])->name('task.edit');



Route::post('taskEdit/{id}',[TaskController::class,'editStore'])->name('task.edit.store');
