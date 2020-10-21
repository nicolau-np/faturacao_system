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
        $produtos = Produto::paginate(6);
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Listar",
            'type' => "view",
            'getProdutos' => $produtos,

        ];

        return view("produto.list", $data);
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
            'nome' => ['required', 'string', 'min:3', 'max:70', 'unique:produtos,nome']

        ]);

        if ($request->id_tipo == 1) {
            $request->validate([
                'data_caducidade' => ['required', 'date']
            ]);
        }

        if (Produto::create($request->except('_token'))) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return back()->with(['error' => "Não encontrou produto"]);
        }

        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Novo",
            'type' => "show",
            'getProduto' => $produto

        ];

        return view("produto.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return back()->with(['error' => "Não encontrou produto"]);
        }
        $classe_produto = ClasseProduto::pluck('classe', 'id');
        $tipo_produto = TipoProduto::pluck('tipo', 'id');
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Novo",
            'type' => "form",
            'getClasseProduto' => $classe_produto,
            'getTipoProduto' => $tipo_produto,
            'getProduto' => $produto

        ];

        return view("produto.edit", $data);
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
        $produto = Produto::find($id);
        if (!$produto) {
            return back()->with(['error' => "Não encontrou produto"]);
        }

        $request->validate([
            'id_classe_produto' => ['required', 'Integer'],
            'id_tipo' => ['required', 'Integer'],
            'nome' => ['required', 'string', 'min:3', 'max:70']

        ]);

        if ($request->id_tipo == 1) {
            $request->validate([
                'data_caducidade' => ['required', 'date']
            ]);
        }

        if (Produto::find($id)->update($request->except('_token'))) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
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
