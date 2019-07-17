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

Route::get('/','IndexController@index' );
Route::get('users/{id}','IndexController@show')->name('users.show');
Route::get('users','IndexController@users')->name('users.users');
Route::get('attendance','IndexController@attendance')->name('users.attendance');

//出勤退勤ボタン
Route::post('start', 'TimeController@start')->name('time.start_time');
Route::post('end', 'TimeController@end')->name('time.end_time');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');