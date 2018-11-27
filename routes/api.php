<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Authorization Routes
 */
Route::post('/login', 'AuthController@login');

/**
 * Institution Routes
 */
Route::post('/institution', 'InstitutionController@create');
Route::get('/institutions', 'InstitutionController@list');
Route::get('/institutions/{id}', 'InstitutionController@get');
Route::patch('/institutions/{id}', 'InstitutionController@update');
Route::delete('/institutions/{id}', 'InstitutionController@delete');

/**
 * User Routes
 */
Route::post('/user', 'UsersController@create');
Route::get('/users', 'UsersController@list');
Route::get('/users/{id}', 'UsersController@get');
Route::patch('/users/{id}', 'UsersController@update');
Route::delete('/users/{id}', 'UsersController@delete');

/**
 * Class Routes
 */
Route::post('/class', 'ClassController@create');
Route::get('/class', 'ClassController@list');
Route::get('/class/{id}', 'ClassController@get');
Route::patch('/class/{id}', 'ClassController@update');
Route::delete('/class/{id}', 'ClassController@delete');

/**
 * Event Routes
 */
Route::post('/event', 'EventsController@create');
Route::get('/events', 'EventsController@list');
Route::get('/events/{id}', 'EventsController@get');
Route::patch('/events/{id}', 'EventsController@update');
Route::delete('/events/{id}', 'EventsController@delete');

/**
 * Lernfeld Routes
 */
Route::post('/lernfeld', 'LernfeldController@create');
Route::get('/lernfeld', 'LernfeldController@list');
Route::get('/lernfeld/{id}', 'LernfeldController@get');
Route::patch('/lernfeld/{id}', 'LernfeldController@update');
Route::delete('/lernfeld/{id}', 'LernfeldController@delete');

/**
 * Timeslot Routes
 */
Route::post('/timeslots', 'TimeslotController@create');
Route::get('/timeslots', 'TimeslotController@list');
Route::get('/timeslots/{id}', 'TimeslotController@get');
Route::patch('/timeslots/{id}', 'TimeslotController@update');
Route::delete('/timeslots/{id}', 'TimeslotController@delete');
