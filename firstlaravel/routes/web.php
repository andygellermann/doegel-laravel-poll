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

use App\Http\Controllers\PageController;
use App\Repositories\UserRepository;
Route::get('/twitter', function(\App\Twitter $twitter) {
    dd($twitter);
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/logout','Auth\LoginController@logout');

//Route::get('/', 'PageController@home');
Route::get('/contact', 'PageController@contact');
Route::get('/about', 'PageController@about');

// To receive Post-Data from Formaction using "Post" as Method!
Route::post('/send', 'PageController@send');

// ooh, that's impressive!
// catch all significant states in "resource"!
Route::resource('projects','ProjectsController')->middleware('auth');
Route::resource('tasks','TasksController')->middleware('auth');

// To receive Post(ed) Patch-Data you have to to next:
Route::post('/projects/{project}/tasks','ProjectTasksController@store')->middleware('can:update,project');
Route::patch('/tasks/{task}','ProjectTasksController@update');



