<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('Rget');

Route::get('task', 'TasksController@index')->name('Rtask');

Route::get('task1', 'WorksController@work')->name('Rtask1');

Route::get('site', 'KnowsController@know')->name('Rsite');
