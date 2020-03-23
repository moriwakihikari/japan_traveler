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
    Route::get('blog/create', 'Hikari\BlogController@add');//->middleware('auth');
    Route::post('blog/create', 'Hikari\BlogController@create');//->middleware('auth');
    Route::get('blog/list', 'Hikari\BlogController@list');
    Route::get('blog/edit', 'Hikari\BlogController@edit');//->middleware('auth');
    Route::post('blog/edit', 'Hikari\BlogController@update');//->middleware('auth');
    Route::get('blog/prefecture', 'Hikari\BlogController@prefecture');
    Route::get('blog/prefecture/city', 'Hikari\BlogController@city');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('rondom', 'Hikari\RondomController@index');
    Route::get('rondom/result', 'Hikari\RondomController@result');
});

Route::group(['prefix' => 'hikari'], function() {
    Route::get('keijiban/index', 'Hikari\KeijibanController@index');
    Route::get('keijiban/thread/create', 'Hikari\KeijibanController@add');//->middleware('auth');
    Route::post('keijiban/thread/create', 'Hikari\KeijibanController@create');//->middleware('auth');
   // Route::get('keijiban/thread/edit', 'Hikari\KeijibanController@edit');//->middleware('auth');
    //Route::post('keijiban/thread/edit', 'Hikari\KeijibanController@update');//->middleware('auth');
    Route::get('keijiban/thread/in', 'Hikari\KeijibanController@in');//->middleware('auth');
});

Route::get('/', 'Hikari\HomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//ログイン Admin用
Route::group(['prefix' => 'admins'], function () {
Route::get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin_auth.login');
Route::post('login', 'AuthAdmin\LoginController@login')->name('admin_auth.login');
Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin_auth.logout');
Route::post('password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin_auth.password.email');
Route::get('password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin_auth.password.request');
Route::post('password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin_auth.password.update');
Route::get('password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin_auth.password.reset');
});



/*
//全ユーザー
Route::group(['middleware' => ['auth', 'can:user-higher']],function(){
    Route::get('keijiban/thread/create', 'Hikari\KeijibanController@add');
    Route::post('keijiban/thread/create', 'Hiakri\KeijibanController@create');
    Route::get('keijiban/thread/edit', 'Hiakri\KeijibanController@edit');
    Route::Post('keijiban/thread/edit', 'Hikari\KeijibanController@update');
});

//管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function() {
    Route::get('blog/create', 'Hikari\BlogController@add');
    Route::post('blog/create', 'Hikari\BlogController@create');
    Route::get('blog/edit', 'Hikari\BlogController@edit');
    Route::post('blog/edit', 'Hikari\BlogController@update');
});

//システム管理者
Route::group(['middleware'=>['auth', 'can:system-only']], function() {
    
});
*/