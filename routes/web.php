<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@delete');
Route::get('/mypage/mypage', 'MypageController@mypage');
Route::resource('/mypage', 'MypageController')->only(['index'])->middleware('auth');
Route::get('/mypage/{post}', 'MypageController@show');
//メール送信
Route::get('/mail/index/{post_user_id}', 'MailController@index')->middleware('auth');
Route::get('/mail/entry_mail/{post_user_id}', 'MailController@entry')->middleware('auth');
Route::get('/mail/entry_complete', 'MailController@complete');
//投稿確認ページ

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('user', 'UserController')->only(['index', 'edit', 'update'])->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 必要なルーティングのみに限定する
Route::resource('user', 'UserController')->only(['index', 'edit', 'update'])->middleware('auth');