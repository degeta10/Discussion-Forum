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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/index', 'HomeController@index')->name('home');

    Route::get('/user-notifications', 'NotificationController@get')->name('user.notifications');
    Route::get('/send/notification', 'NotificationController@send')->name('notification.send');

    Route::post('/comments', 'NotificationController@getComments')->name('get.comments');
    Route::post('/send/comment', 'NotificationController@sendComment')->name('send.comment');

    Route::resource('discussions', 'DiscussionController');
});

