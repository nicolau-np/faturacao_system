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


Route::group(['prefix' => '/funcionarios', 'middleware' => 'auth'], function () {
    Route::get('/', "FuncionarioController@index");
    Route::get('/novo', "FuncionarioController@create");
});

Route::group(['prefix' => '/clientes', 'middleware' => 'auth'], function () {
    Route::get('/', "ClienteController@index");
    Route::get('/novo', "ClienteController@create");
});

Route::group(['prefix' => '/fornecedores', 'middleware' => 'auth'], function () {
    Route::get('/', "FornecedorController@index");
    Route::get('/novo', "FornecedorController@create");
});

Route::group(['prefix' => '/produtos', 'middleware' => 'auth'], function () {
    Route::get('/', "ProdutoController@index");
    Route::get('/novo', "ProdutoController@create");
});

Route::group(['prefix' => '/compras', 'middleware' => 'auth'], function () {
    Route::get('/', "CompraController@index");
    Route::get('/novo', "CompraController@create");
});

Route::group(['prefix' => '/vendas', 'middleware' => 'auth'], function () {
    Route::get('/', "VendaController@index");
    Route::get('/novo', "VendaController@create");
});