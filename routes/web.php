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

//ログイン時
Route::group(['middleware' => 'auth'], function () {
    
Route::get('/timeline','TimelineController@index');
Route::post('/timeline','TimelineController@post');
Route::get('/timeline/detail/{id}','TimelineController@show')->name('postdetail');
Route::post('/timeline/detail','CommentController@comment');


Route::get('/mypage/{id}','PagesController@show')->name('mypage');
Route::get('/mypage/editmypage/{id}','PagesController@edit');
Route::post('/mypage/editmypage','PagesController@update');

});