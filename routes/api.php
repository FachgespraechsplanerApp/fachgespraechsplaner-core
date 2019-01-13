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
//Route::post('/login', 'AuthController@login');

/**
 * User Routes
 */
Route::post('/user', 'UserController@create');
Route::get('/users', 'UserController@list');
Route::get('/users/{id}', 'UserController@get');
Route::patch('/users/{id}', 'UserController@update');
Route::delete('/users/{id}', 'UserController@delete');

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

/**
 * Schulform Routes
 */
Route::post('/schulform', 'SchulformController@create');
Route::get('/schulform', 'SchulformController@list');
Route::get('/schulform/{id}', 'SchulformController@get');
Route::patch('/schulform/{id}', 'SchulformController@update');
Route::delete('/schulform/{id}', 'SchulformController@delete');
