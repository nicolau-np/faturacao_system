<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\NotaCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = NotaCompra::paginate(5);

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
        if(!$compra){
            return back()->with(['error'=>"Não encontrou compra"]);
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
        if(!$compra){
            return back()->with(['error'=>"Não encontrou compra"]);
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
        if(!$compra){
            return back()->with(['error'=>"Não encontrou compra"]);
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
        if(!$compra){
            return back()->with(['error'=>"Não encontrou compra"]);
        }
        $data = [
            'title' => "Compras",
            'menu' => "Compras",
            'submenu' => "Adicionar Produto",
            'type' => "form"

        ];

        return view("compra.add_produto", $data); 
    }
}