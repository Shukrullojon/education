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
    Route::resource('task',\App\Http\Controllers\TaskController::class);
    Route::resource('pc',\App\Http\Controllers\PCController::class);
    Route::resource('pt',\App\Http\Controllers\PTController::class);
    Route::resource('event',\App\Http\Controllers\EventController::class);
    Route::get('testresults/all','\App\Http\Controllers\PTController@results')->name('ptResult');

    Route::group(['prefix' => 'group', 'namespace' => '\App\Http\Controllers'], function () {
        Route::resource('group',GroupController::class);
        Route::post('detailstore', 'GroupController@detailstore')->name('groupdetailstore');
        Route::post('studentstore', 'GroupController@studentstore')->name('groupstudentstore');
    });

    Route::group(['prefix' => 'student', 'namespace' => '\App\Http\Controllers'], function () {
        Route::get('/create', 'StudentController@create')->name('studentCreate');
        Route::get('/waiting', 'StudentController@waiting')->name('studentWaiting');
        Route::get('/active', 'StudentController@active')->name('studentActive');
        Route::get('/all', 'StudentController@all')->name('studentAll');
        Route::get('/archive', 'StudentController@archive')->name('studentArchive');
        Route::post('/store', 'StudentController@store')->name('studentStore');
        Route::get('/edit/{id}', 'StudentController@edit')->name('studentEdit');
        Route::patch('/update/{id}', 'StudentController@update')->name('studentUpdate');
        Route::get('/show/{id}', 'StudentController@show')->name('studentShow');
        Route::get('/work', 'StudentController@work')->name('studentWork');
        Route::post('/work/store', 'StudentController@workStore')->name('studentWorkStore');
        Route::get('/work/result/{id}', 'StudentController@result')->name('studentWorkResult');
    });
});

