<?php

namespace App\Http\Controllers;

use App\ClasseProduto;
use App\ItemVenda;
use App\NotaVenda;
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
            'nome' => ['required', 'string', 'min:3', 'max:70', 'unique:produtos,nome,except,id']

        ]);

        $data = [
            'id_classe_produto' => $request->id_classe_produto,
            'id_tipo' => $request->id_tipo,
            'nome' => $request->nome,
            'quantidade' => 0
        ];
        if (Produto::create($data)) {
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
            'submenu' => "Mostrar",
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

    public function getProduto(Request $request)
    {
        $produto = Produto::where('nome', 'LIKE', "%{$request->produto}%")->get();

        $data = [
            'getProduto' => $produto
        ];

        return view("ajax.getProduto", $data);
    }

    public function getProdutoCarrinho(Request $request)
    {
        $produto = Produto::where('nome', 'LIKE', "%{$request->produto}%")->get();

        $data = [
            'getProduto' => $produto
        ];

        return view("ajax.getProdutoCarrinho", $data);
    }

    public function grafico(){
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Gráfico",
            'type' => "form",

        ];

        return view("produto.grafico", $data);
    }

    public static function getProdutos(){
        $produtos = Produto::get();
        return $produtos;  
    }

    public static function getValuesProduto($id_produto, $ano){
        $retorno = 0;
        $data = [
            'id_produto'=>$id_produto,
            'ano'=>$ano,
        ];
        $produtos = ItemVenda::whereHas('nota_venda', function($query) use ($data){
            $query->where('ano', $data['ano']);
        })->where('id_produto', $data['id_produto'])->get();
    
        foreach($produtos as $produto){
            $retorno = $retorno + $produto->valor;
        }
        return $retorno;
    }

  
}