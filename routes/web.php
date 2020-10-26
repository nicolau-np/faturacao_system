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
    Route::post('/store', "FornecedorController@store");
    Route::get('/edit/{id_fornecedor}', "FornecedorController@edit");
    Route::put('/update/{id_fornecedor}', "FornecedorController@update");
    Route::get('/show/{id_fornecedor}', "FornecedorController@show");
});

Route::group(['prefix' => '/produtos', 'middleware' => 'auth'], function () {
    Route::get('/', "ProdutoController@index");
    Route::get('/novo', "ProdutoController@create");
    Route::post('/store', "ProdutoController@store");
    Route::get('/edit/{id_produto}', "ProdutoController@edit");
    Route::put('/update/{id_produto}', "ProdutoController@update");
    Route::get('/show/{id_produto}', "ProdutoController@show");
});

Route::group(['prefix' => '/compras', 'middleware' => 'auth'], function () {
    Route::get('/', "CompraController@index");
    Route::get('/novo', "CompraController@create");
    Route::post('/store', "CompraController@store");
    Route::get('/edit/{id_compra}', "CompraController@edit");
    Route::put('/update/{id_compra}', "CompraController@update");
    Route::get('/show/{id_compra}', "CompraController@show");
    Route::get('/item_compra/novo/{id_compra}', "CompraController@add_produto");
    Route::put('/store_addProduto/{id_compra}', "CompraController@store_addProduto");
    Route::get('/item_compra/{id_compra}', "CompraController@list_produtoCompra");
});

Route::group(['prefix' => '/vendas', 'middleware' => 'auth'], function () {
    Route::get('/', "VendaController@index");
    Route::get('/show/{id_nota_venda}', "VendaController@show");
});

Route::group(['prefix' => '/carrinho', 'middleware' => 'auth'], function () {
    Route::get('/list/{id_nota_venda}', "CarrinhoController@index");
    Route::put('/store/{id_nota_venda}', "CarrinhoController@store");
    Route::put('/finalizar/{id_nota_venda}', "CarrinhoController@finalizar");
    Route::get('/eliminarProduto/{id_item_venda}', "CarrinhoController@destroy");
    Route::get('/decrement/{id_item_venda}', "CarrinhoController@decrement");
    Route::get('/increment/{id_item_venda}', "CarrinhoController@increment");
    Route::put('/barcode/{id_nota_venda}', "CarrinhoController@barcode");
});

Route::group(['prefix' => '/relatorios', 'middleware'=>"auth"], function () {
   Route::get('/fatura/{id_nota_venda}', "RelatorioController@fatura");
});

Route::group(['prefix' => '/notas_venda'], function () {
    Route::get('/store', "NotaVendaController@store");
    Route::post('/getitemVenda', "NotaVendaController@getitemVenda")->name('getitemVenda');
});

Route::group(['prefix' => 'ajax', 'middleware' => 'auth'], function () {
    Route::post('getMunicipio', "MunicipioController@getMunicipio")->name('getMunicipio');
    Route::post('getProduto', "ProdutoController@getProduto")->name('getProduto');
    Route::post('getProdutoCarrinho', "ProdutoController@getProdutoCarrinho")->name('getProdutoCarrinho');
});

Route::group(['prefix' => 'graficos', 'middleware'=>"auth"], function () {
    Route::get('/produtos', "GraficoController@grafico");
});