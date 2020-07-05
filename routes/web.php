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


//先生用認証
Route::group(['prefix' => 'admins'], function () { //teachesディレクトリをここで指定しておく
Route::get('login', 'AuthAdmin\LoginController@showLoginForm')->name('admin_auth.login');
Route::post('login', 'AuthAdmin\LoginController@login')->name('admin_auth.login');
Route::post('logout', 'AuthAdmin\LoginController@logout')->name('admin_auth.logout');
Route::post('password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin_auth.password.email');
Route::get('password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin_auth.password.request');
Route::post('password/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admin_auth.password.update');
Route::get('password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin_auth.password.reset');
});
