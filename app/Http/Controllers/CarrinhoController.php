<?php

namespace App\Http\Controllers;

use App\ItemVenda;
use App\NotaVenda;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index($id)
    {
        $nota_venda = NotaVenda::find($id);
        if (!$nota_venda) {
            return back()->with(['error' => "Não encontrou a nota de venda"]);
        }
        $data = [
            'title' => "Carrinho",
            'menu' => "Carrinho",
            'submenu' => "Carrinho",
            'type' => "view_form",
            'getnotaVenda' => $nota_venda

        ];
        return view("carrinho.list", $data);
    }

    public function store(Request $request, $id)
    {
        $nota_venda = NotaVenda::find($id);
        if (!$nota_venda) {
            return back()->with(['error' => "Não encontrou a nota de venda"]);
        }

        $request->validate([
            'quantidade' => ['required', 'Integer'],
            'id_produto' => ['required', 'Integer']
        ]);

        $produto = Produto::find($request->id_produto);

        $item_venda = ItemVenda::with(['nota_venda' => function ($query) {
            $query->where('status', "processo");
        }])->where('id_produto', $request->id_produto)->get();

        /*$total_produto = 0;
        if ($item_venda->count() >= 1) {

            foreach ($item_venda as $item) {
                $total_produto = $total_produto + $item->quantidade;
            }
            echo "Encontrou: " . $total_produto;
        } else {
            echo "Nao encontrou: " . $total_produto;
        }*/

        /* if(ItemVenda::where(['id_nota_venda'=>$id, 'id_produto'=>$request->id_produto])->first()){
            return back()->with(['error'=>"Já adicionou este produto no carrinho"]);
        }*/
$data = [
    'id_nota_venda'=>$id,
    'id_usuario'=>Auth::user()->id,
    'id_produto'=>$request->id_produto,
    'quantidade'=>$request->quantidade,
    'valor_compra'=>$produto->item_compra->last()->valor_compra,
    'valor_venda'=>$produto->item_compra->last()->valor_venda,
];
if(ItemVenda::create($data)){
    return back()->with(['success'=>"Adicionado"]);
}
        
        
    }

    public function update()
    {
    }

    public function increment()
    {
    }

    public function decrement()
    {
    }
}