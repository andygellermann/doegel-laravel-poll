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

Route::get('/', 'PageController@home');

Route::get('/contact', 'PageController@contact');

// To receive Post-Data from Formaction using "Post" as Method!
Route::post('/send', 'PageController@send');

Route::get('/about', 'PageController@about');

// catch all significant states in "resource"
Route::resource('projects','ProjectsController');
Route::resource('tasks','TasksController');

Route::get('/welcome', function() {

    $liste = [
        'Donnerstag: Abschiedskuchen',
        'Donnerstag: Arbeitseinsatz bei Basti',
        'Freitag: 10k-Lauf',
        'Sonntag: Platzreife in Wilkendorf'
    ];
    return view('welcome', [
        'liste' => $liste
    ]);

});

