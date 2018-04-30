<?php

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

Route::group(['middleware' => 'auth'], function() {
    Route::redirect('/', '/books');
    Route::resource('/books', 'BooksController');
    Route::resource('/authors', 'AuthorsController');
    Route::resource('togglReports', 'TogglReportsController', ['only' => ['index', 'create', 'store', 'destroy']]);

    Route::get('/toggl/index', 'TogglController@index')->name('toggl.index');
    Route::get('/toggl/timeEntries', 'TogglController@timeEntries')->name('toggl.timeEntries');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
