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
    return view('welcome');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('blog/index', 'Hikari\BlogController@index');
    Route::get('blog/create', 'Hikari\BlogController@create');
    Route::get('blog/list', 'Hikari\BlogController@list');
    Route::get('blog/edit', 'Hikari\BlogController@edit');
    Route::get('blog/prefecture', 'Hikari\BlogController@prefecture');
    Route::get('blog/prefecture/city', 'Hikari\BlogController@city');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('rondom', 'Hikari\RondomController@index');
    Route::get('rondom/result', 'Hikari\RondomController@result');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('keijiban/index', 'Hikari\KeijibanController@index');
    Route::get('keijiban/thread/create', 'Hikari\KeijibanController@create');
    Route::get('keijiban/thread/edit', 'Hikari\KeijibanController@edit');
    Route::get('keijiban/thread/in', 'Hikari\KeijibanController@in');
});

Route::get('/', 'Hikari\HomeController@index');
