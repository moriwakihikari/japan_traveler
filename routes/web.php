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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['prefix' => 'hikari'], function() {
    Route::get('blog/index', 'Hikari\BlogController@index')->name('blog_index');
    //adminに移動（下）
    //Route::get('blog/create', 'Hikari\BlogController@add');//->middleware('auth');
    //Route::post('blog/create', 'Hikari\BlogController@create');//->middleware('auth');
    //Route::get('blog/list', 'Hikari\BlogController@list');
    //Route::get('blog/edit', 'Hikari\BlogController@edit');//->middleware('auth');
    //Route::post('blog/edit', 'Hikari\BlogController@update');//->middleware('auth');
    Route::get('blog/prefecture', 'Hikari\BlogController@prefecture');
    Route::get('blog/prefecture/city', 'Hikari\BlogController@city');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('rondom', 'Hikari\RondomController@index');
    Route::get('rondom/result', 'Hikari\RondomController@result');
    Route::get('keijiban/index', 'Hikari\KeijibanController@index');

});

Route::group(['prefix' => 'hikari', 'middleware' => 'auth'], function() {
    Route::get('keijiban/thread/create', 'Hikari\KeijibanController@add');
    Route::post('keijiban/thread/create', 'Hikari\KeijibanController@create');
    Route::get('keijiban/thread/edit', 'Hikari\KeijibanController@edit');
    Route::post('keijiban/thread/edit', 'Hikari\KeijibanController@update');
    Route::get('keijiban/thread/delete', 'Hikari\KeijibanController@delete');
    Route::get('keijiban/thread/in', 'Hikari\KeijibanController@in');
    Route::post('keijiban/thread/in', 'Hikari\KeijibanController@toukou');
});

Route::get('/', 'Hikari\HomeController@index');

Auth::routes();
//ユーザー認証不要
//Route::get('/', function() { return redirect('/home'); });

//Userログイン後
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

//Admin認証不要
Route::group(['prefix' => 'admin'], function () {
Route::get('/', function() { return redirect('/admin/home'); });
Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Admin\Auth\LoginController@login');
});

//Admin　ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('blog/create', 'Hikari\BlogController@add');
    Route::post('blog/create', 'Hikari\BlogController@create');
    Route::post('blog/select_prefecture', 'Hikari\BlogController@selectCity');
    Route::get('blog/list', 'Hikari\BlogController@list');
    Route::get('blog/edit', 'Hikari\BlogController@edit');
    Route::post('blog/edit', 'Hikari\BlogController@update');
    Route::get('blog/delete', 'Hikari\BlogController@delete');

});

