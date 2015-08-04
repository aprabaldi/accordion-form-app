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

//Registers a user
Route::post('/form', 'UserController@store');

//Shows form to register a User
Route::get('/form', 'UserController@create');

//Shows Users registered in the db
Route::get('/', 'UserController@index');

//Defining the route this way allows easier redirection
Route::get('/thanks',[
    'as' => 'thanks',
    'uses' => 'UserController@thanks'
]);