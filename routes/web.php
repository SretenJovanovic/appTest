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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::get('/profile/{user}', 'ProfilesController@index');

Route::get('/reminder/create', 'RemindersController@create');
Route::get('/reminder/{user}', 'RemindersController@index');
Route::post('/reminder', 'RemindersController@store');

Route::get('/mernaOprema/spisak','MernaOpremaController@index');
Route::post('/mernaOprema','MernaOpremaController@store');

Route::get('/mernaOprema/karton/{merilo}/create', 'KartonMerilasController@create');
Route::get('/mernaOprema/karton','KartonMerilasController@index');
Route::post('/mernaOprema/karton/{merilo}','KartonMerilasController@store');
Route::get('/mernaOprema/karton/{karton}/show', 'KartonMerilasController@show');
Route::post('/mernaOprema/karton/{merilo}/popravka','KartonMerilasController@popravkaStore');
