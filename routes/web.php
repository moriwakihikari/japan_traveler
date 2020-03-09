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
    Route::get('prefecture', 'Hikari\PrefectureController@index');
    Route::get('prefecture/create', 'Hikari\PrefectureController@create');
    Route::get('prefecture/osaka', 'Hikari\PrefectureController@osaka');
    Route::get('prefecture/osaka/osaka', 'Hikari\PrefectureController@osaka_osaka');
    Route::get('prefecture/edit', 'Hikari\PrefectureController@edit');
    Route::post('prefecture/delete', 'Hikari\PrefectureController@delete');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('rondom', 'Hikari\RondomController@index');
    Route::get('rondom/result', 'Hikari\RondomController@result');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('bulltin_board', 'Hikari\Bulletin_BoardController@index');
    Route::get('bulltin_board/thread', 'Hikari\Bulletin_BoardController@thread');
    Route::post('bulltin_board/thread/create', 'Hikari\Bulletin_BoardController@thread_create');
    Route::post('bulltin_board/thread/edit', 'Hikari\Bulletin_BoardController@thread_edit');
    Route::post('bulltin_board/thread/delete', 'Hikari\Bulletin_BoardController@thread_delete');
    Route::get('bulltin_board/in', 'Hikari\Bulletin_BoardController@in');
    Route::post('bulltin_board/in/edit', 'Hikari\Bulletin_BoardController@in_edit');
    Route::post('bulltin_board/in/delete', 'Hikari\Bulletin_BoardController@in_delete');
});

Route::get('/', 'Hikari\HomeController@index');
