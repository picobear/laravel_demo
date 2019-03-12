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


// Authentication Routes...
Route::get('/user/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/user/login', 'Auth\LoginController@login');
Route::post('/user/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/user/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('/user/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/user/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/user/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/user/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user/message', 'MessageController@index')->name('message');
Route::post('/user/message', 'MessageController@store');

Route::get('/user/message/list', 'MessageController@list');
Route::get('/user/message/reply/{id}', 'MessageController@reply');
Route::post('/user/message/reply', 'MessageController@reply_post')->name('reply_message');