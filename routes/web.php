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


Route::get('/login', 'UserController@loginForm')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/logar', "UserController@logar");

Route::get('/', 'HomeController@index')->middleware('auth')->name('home');