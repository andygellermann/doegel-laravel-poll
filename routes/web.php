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
use App\Notifications\SubscriptionRenewalFailed;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use App\Repositories\UserRepository;
use App\Notifications\slackNotification;

Auth::routes();
Route::get('/', 'VoteController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'PageController@about');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/umfrage', 'VoteController@index');
Route::get('/umfragen', 'VoteController@direktindex');
Route::get('/umfrage/{poll}', 'VoteController@show')->where('poll','[0-9]');
Route::patch('/umfrage/{poll}/vote', 'VoteController@update')->where('poll','[0-9]');

Route::resource('polls','PollController')->middleware('auth');

// To receive Post(ed) Patch-Data you have to to next:
Route::patch('/tasks/{task}','ProjectTasksController@update')->where('task','[0-9]')->middleware('auth');
Route::patch('/question/{question}','PollQuestionController@update')->middleware('auth'); // don't forget middleware auth control
Route::delete('/question/{question}','PollQuestionController@destroy')->middleware('auth'); // don't forget middleware auth control

Route::post('/polls/{poll}/question','PollQuestionController@store'); // don't forget middleware auth control
Route::post('/polls/question/post', 'QuestionController@updatePositions'); // don't forget middleware auth-control
Route::post('/fiprcheck/{poll}/{fipr}', 'VoteController@fiprcheck')->where('poll','[0-9]');
