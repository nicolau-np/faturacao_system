<?php

namespace App\Http\Controllers;

use App\ItemVenda;
use App\NotaVenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaVendaController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = [
            'status' => "processo",
            'id_usuario' => Auth::user()->id
        ];
        if (NotaVenda::create($data)) {
            return back()->with(['success' => "Carrinho criado com sucesso"]);
        }else{
            return back()->with(['error'=>"Erro ao criar Carrinho"]);
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

    public function getitemVenda(Request $request){
        $item_venda = ItemVenda::where('id_nota_venda', $request->id_nota_venda)->get();
        $data = [
            'getitemVenda'=>$item_venda
        ];
        return view("ajax.getitemVenda", $data);
    }
}