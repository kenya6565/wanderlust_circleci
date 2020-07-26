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

//ログイン一般ユーザー
Route::group(['prefix' => 'timeline',['middleware' => 'auth']], function () {
    Route::get('/','User\TimelineController@index');
    Route::post('/','User\TimelineController@post');
    Route::get('detail/{id}','User\TimelineController@show')->name('postdetail');
    Route::post('detail','User\CommentController@comment');
    Route::get('detail/edit/{id}','User\TimelineController@edit');
    Route::post('detail/edit','User\TimelineController@update');
    Route::post('detail/{id}', 'User\TimelineController@delete');
    Route::get('users/{id}','User\PagesController@show')->name('mypage');
    Route::get('users/edit/{id}','User\PagesController@edit');
    Route::post('users/edit','User\PagesController@update');
    Route::get('followings/{id}', 'User\FollowsController@showFollowings')->name('followings');
    Route::get('followers/{id}', 'User\FollowsController@showFollowers')->name('followers');
    Route::post('follow/{id}', 'User\FollowsController@store')->name('follow');
    Route::delete('unfollow/{id}', 'User\FollowsController@destroy')->name('unfollow');
    Route::get('/search', 'User\TimelineController@search')->name('search');
    Route::post('like','User\LikesController@store')->name('like');
    Route::delete('unlike','User\LikesController@destroy')->name('unlike');
});
