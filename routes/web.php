<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTaskController;
use App\Http\Controllers\CourceController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('filial',FilialController::class);
    Route::resource('room',RoomController::class);
    Route::resource('roomtask',RoomTaskController::class);
    Route::resource('room-task',RoomTaskController::class);
    Route::resource('task-room',RoomTaskController::class);
    Route::resource('cource',CourceController::class);
    Route::resource('group',GroupController::class);
});



