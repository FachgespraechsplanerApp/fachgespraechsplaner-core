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
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

/**
 * User Routes
 */
Route::post('/user', 'UserController@create')->middleware('auth:api');;
Route::get('/users', 'UserController@list')->middleware('auth:api');;
Route::get('/users/{id}', 'UserController@get')->middleware('auth:api');;
Route::patch('/users/{id}', 'UserController@update')->middleware('auth:api');;
Route::delete('/users/{id}', 'UserController@delete')->middleware('auth:api');;

/**
 * Class Routes
 */
Route::post('/class', 'ClassController@create')->middleware('auth:api');;
Route::get('/class', 'ClassController@list')->middleware('auth:api');;
Route::get('/class/{id}', 'ClassController@get')->middleware('auth:api');;
Route::patch('/class/{id}', 'ClassController@update')->middleware('auth:api');;
Route::delete('/class/{id}', 'ClassController@delete')->middleware('auth:api');;

/**
 * Event Routes
 */
Route::post('/event', 'EventsController@create')->middleware('auth:api');;
Route::get('/events', 'EventsController@list')->middleware('auth:api');;
Route::get('/events/{id}', 'EventsController@get')->middleware('auth:api');;
Route::patch('/events/{id}', 'EventsController@update')->middleware('auth:api');;
Route::delete('/events/{id}', 'EventsController@delete')->middleware('auth:api');;

/**
 * Lernfeld Routes
 */
Route::post('/lernfeld', 'LernfeldController@create')->middleware('auth:api');;
Route::get('/lernfeld', 'LernfeldController@list')->middleware('auth:api');;
Route::get('/lernfeld/{id}', 'LernfeldController@get')->middleware('auth:api');;
Route::patch('/lernfeld/{id}', 'LernfeldController@update')->middleware('auth:api');;
Route::delete('/lernfeld/{id}', 'LernfeldController@delete')->middleware('auth:api');;

/**
 * Timeslot Routes
 */
Route::post('/timeslots', 'TimeslotController@create')->middleware('auth:api');;
Route::get('/timeslots', 'TimeslotController@list')->middleware('auth:api');;
Route::get('/timeslots/{id}', 'TimeslotController@get')->middleware('auth:api');;
Route::patch('/timeslots/{id}', 'TimeslotController@update')->middleware('auth:api');;
Route::delete('/timeslots/{id}', 'TimeslotController@delete')->middleware('auth:api');;

/**
 * Schulform Routes
 */
Route::post('/schulform', 'SchulformController@create')->middleware('auth:api');;
Route::get('/schulform', 'SchulformController@list')->middleware('auth:api');;
Route::get('/schulform/{id}', 'SchulformController@get')->middleware('auth:api');;
Route::patch('/schulform/{id}', 'SchulformController@update')->middleware('auth:api');;
Route::delete('/schulform/{id}', 'SchulformController@delete')->middleware('auth:api');;
