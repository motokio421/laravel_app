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
//正しい道すじできてるか
Route::get('/', function () {//getで/にリクエストが飛んで来たら、function実行
    return view('welcome');
});
Route::resource('todo', 'TodoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
