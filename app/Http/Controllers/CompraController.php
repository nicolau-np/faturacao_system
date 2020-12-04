<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\ItemCompra;
use App\NotaCompra;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('gerenteAdmin'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = NotaCompra::orderBy('id', 'desc')->paginate(5);

        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Listar",
            'type' => "view",
            'getCompras' => $compras

        ];

        return view("compra.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::pluck('entidade', 'id');
        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Novo",
            'type' => "form",
            'getFornecedores' => $fornecedores

        ];

        return view("compra.new", $data);
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
            'id_fornecedor' => ['required', 'Integer'],
            'valor_total' => ['required', 'numeric'],
            'data_emissao' => ['required', 'date']
        ]);

        $data = [
            'id_fornecedor' => $request->id_fornecedor,
            'id_usuario' => Auth::user()->id,
            'valor_total' => $request->valor_total,
            'data_emissao' => $request->data_emissao,
            'data_vencimento' => $request->data_vencimento,
            'desconto' => $request->desconto,
            'status' => "on"
        ];

        if (NotaCompra::create($data)) {
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
        $compra = NotaCompra::find($id);
        if (!$compra) {
            return back()->with(['error' => "Não encontrou compra"]);
        }

        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Mostrar",
            'type' => "show",
            'getCompra' => $compra

        ];

        return view("compra.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = NotaCompra::find($id);
        if (!$compra) {
            return back()->with(['error' => "Não encontrou compra"]);
        }

        $fornecedores = Fornecedor::pluck('entidade', 'id');
        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Novo",
            'type' => "form",
            'getFornecedores' => $fornecedores,
            'getCompra' => $compra

        ];

        return view("compra.edit", $data);
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
        $compra = NotaCompra::find($id);
        if (!$compra) {
            return back()->with(['error' => "Não encontrou compra"]);
        }

        $request->validate([
            'id_fornecedor' => ['required', 'Integer'],
            'valor_total' => ['required', 'numeric'],
            'data_emissao' => ['required', 'date']
        ]);

        $data = [
            'id_fornecedor' => $request->id_fornecedor,
            'valor_total' => $request->valor_total,
            'data_emissao' => $request->data_emissao,
            'data_vencimento' => $request->data_vencimento,
            'desconto' => $request->desconto
        ];

        if (NotaCompra::find($id)->update($data)) {
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

    public function add_produto($id_compra)
    {
        $compra = NotaCompra::find($id_compra);
        if (!$compra) {
            return back()->with(['error' => "Não encontrou compra"]);
        }
        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Adicionar Produto",
            'type' => "form",
            'getCompra' => $compra

        ];

        return view("compra.add_produto", $data);
    }

    public function store_addProduto(Request $request, $id_compra)
    {
        $compra = NotaCompra::find($id_compra);
        if (!$compra) {
            return back()->with(['error' => "Não encontrou compra"]);
        }
        $request->validate([
            'id_produto' => ['required', 'Integer'],
            'quantidade' => ['required', 'Integer'],
            'valor_compra' => ['required', 'numeric'],
            'valor_venda' => ['required', 'numeric']
        ]);

        $data['item_compra'] = [
            'id_usuario' => Auth::user()->id,
            'id_produto' => $request->id_produto,
            'id_nota_compra' => $id_compra,
            'quantidade' => $request->quantidade,
            'valor_compra' => $request->valor_compra,
            'valor_venda' => $request->valor_venda
        ];


        $produto = Produto::find($data['item_compra']['id_produto']);
        if (!$produto) {
            return back()->with(['error' => "Não encontrou o produto"]);
        }

        if ($produto->id_tipo == 1) {
            $request->validate(['data_caducidade' => 'required', 'date']);
        }

        $data['produto'] = [
            'data_caducidade' => $request->data_caducidade
        ];

        if (ItemCompra::where([
            'id_produto' => $data['item_compra']['id_produto'],
            'id_nota_compra' => $data['item_compra']['id_nota_compra']
        ])->first()) {
            return back()->with(['error' => "Já cadastrou este produto nesta compra"]);
        }

        if (ItemCompra::create($data['item_compra'])) {
            if (Produto::find($data['item_compra']['id_produto'])->increment('quantidade', $data['item_compra']['quantidade'])) {
                if ($produto->id_tipo == 1) {
                    Produto::find($data['item_compra']['id_produto'])->update($data['produto']);
                }

                return back()->with(['success' => "Feito com sucesso"]);
            }
        }
    }

    public function list_produtoCompra($id_compra)
    {
        $compra = NotaCompra::find($id_compra);
        if (!$compra) {
            return back()->with(['error' => "Não encontrou compra"]);
        }
        $item_compra = ItemCompra::orderBy('id', 'desc')->where('id_nota_compra', $id_compra)->paginate(5);
        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Itens da Compra",
            'type' => "view",
            'getCompra' => $compra,
            'getItemCompra' => $item_compra
        ];
        return view("compra.list_produtoCompra", $data);
    }
}