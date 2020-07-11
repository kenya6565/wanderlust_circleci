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

Route::get('/timeline','Auth\TimelineController@showTimelinePage');
Route::post('/timeline','Auth\TimelineController@post');
Route::get('/timeline/detail/{id}','Auth\TimelineController@postDetail')->name('postdetail');
Route::post('/timeline/detail','Auth\CommentController@comment');
Route::get('/mypage/{id}','Auth\MypageController@showMyPage');
