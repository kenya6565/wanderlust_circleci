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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admins'], function () { 
Route::get('register', 'AuthAdmin\RegisterController@showRegisterForm')->name('admin_auth.register');
Route::post('register', 'AuthAdmin\RegisterController@register')->name('admin_auth.register');

Route::get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin_auth.login');
Route::post('login', 'AuthAdmin\LoginController@login')->name('admin_auth.login');
Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin_auth.logout');
Route::post('password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin_auth.password.email');
Route::get('password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin_auth.password.request');
Route::post('password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin_auth.password.update');
Route::get('password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin_auth.password.reset');
});
