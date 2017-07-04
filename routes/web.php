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

Route::resource('books', 'BookController');

Route::get('user/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('user/login', 'Auth\LoginController@login');
Route::get('user/logout', ['as' => 'logout', 'uses'=>'Auth\LoginController@logout']);

Route::get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('user/register', 'Auth\RegisterController@register');

Route::get('user/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('user/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('user/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('user/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');
