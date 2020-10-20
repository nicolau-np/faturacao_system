<?php

namespace App\Http\Controllers;

use App\ClasseProduto;
use App\Produto;
use App\TipoProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classe_produto = ClasseProduto::pluck('classe', 'id');
        $tipo_produto = TipoProduto::pluck('tipo', 'id');
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Novo",
            'type' => "form",
            'getClasseProduto' => $classe_produto,
            'getTipoProduto' => $tipo_produto

        ];

        return view("produto.new", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_classe_produto' => ['required', 'Integer'],
            'id_tipo' => ['required', 'Integer'],
            'nome' => ['required', 'string', 'min:4', 'max:70'],
            'valor_compra' => ['required', 'numeric'],
            'valor_venda' => ['required', 'numeric'],

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}