<?php

namespace App\Http\Controllers;

use App\ItemVenda;
use App\NotaVenda;
use App\User;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nota_vendas = NotaVenda::orderBy('id', 'desc')->where('status', "terminado")->paginate(6);
        $data = [
            'title' => "Vendas",
            'menu' => "Vendas",
            'submenu' => "Listar",
            'type' => "view",
            'getnotaVenda' => $nota_vendas
        ];

        return view("venda.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota_vendas = NotaVenda::find($id);
        if(!$nota_vendas){
            return back()->with(['error'=>"Não encontrou nota da venda"]);
        }
        $item_venda = ItemVenda::where('id_nota_venda', $id)->get();
        $data = [
            'title' => "Vendas",
            'menu' => "Vendas",
            'submenu' => "Mostrar",
            'type' => "show",
            'getitemVenda' => $item_venda,
            'getnotaVenda'=>$nota_vendas
        ];

        return view("venda.show", $data);
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

    public function grafico(){
        $data = [
            'title' => "Vendas",
            'menu' => "Vendas",
            'submenu' => "Gráfico",
            'type' => "show",
        ];

        return view("venda.grafico", $data);
    }

    public static function getValueGrafico($mes, $ano, $id_usuario){
        $retorno = 0;
        $data = [
            'mes'=>$mes, 
            'ano'=>$ano, 
            'status'=>"terminado", 
            'id_usuario'=>$id_usuario
        ];
        
        $vendas  = NotaVenda::where($data)->get();
        if($vendas->count()==0){
         
        }else{
            foreach($vendas as $venda){
            $retorno = $retorno + $venda->valor_total;
            }
        }
        
        return $retorno;
    }

    public static function getUsuarios(){
       
        $usuarios = User::where('nivel_acesso','!=', 'admin')->get();
        return $usuarios;
    }
}