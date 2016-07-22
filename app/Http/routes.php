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
Route::group(['middleware' => 'locate'], function () {

    Route::get('/', function () {
        return view('tasks.task');
    })->name('Rget');

    Route::get('task', 'TasksController@index')->name('Rtask');
    Route::get('task1', 'TasksController@getAllDogs')->name('Rtask1');
    Route::auth();

    Route::get('/home', 'HomeController@index')->name('Rhome');

    Route::get('contact',
        ['as' => 'contact', 'uses' => 'TasksController@create']);
    Route::post('contact',
        ['as' => 'contact_store', 'uses' => 'TasksController@store']);

    Route::get('access', function () {
        echo 'You have access!';
    })->middleware('isAdmin');

    Route::get('cats', 'TasksController@getAllCats')->name('Rcats');
    Route::get('parrot', 'TasksController@getAllParrots')->name('Rparrot');
    Route::get('animal/{id}', 'TasksController@showAnimal')->name('Ranimal');
    Route::post('animal/{id}', ['as' => 'task1_store', 'uses' => 'TasksController@hold']);

    Route::get('test', 'TasksController@getAllTasks');
    Route::get('testo', 'TasksController@getAllNotes');
    Route::get('/language', 'TasksController@chooser')->name('language-chooser');
    Route::get('category/{id}', 'TasksController@showAnimalByCategory')->name('rcategory');
});
