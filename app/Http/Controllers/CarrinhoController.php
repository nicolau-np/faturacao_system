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
        $item_venda = ItemVenda::where('id_nota_venda', $id)->get();
        $data = [
            'title' => "Carrinho",
            'menu' => "Carrinho",
            'submenu' => "Carrinho",
            'type' => "view_form",
            'getnotaVenda' => $nota_venda,
            'getitemVenda' => $item_venda

        ];
        return view("carrinho.list", $data);
    }

    public function store(Request $request, $id)
    {
        $nota_venda = NotaVenda::find($id);
        if (!$nota_venda) {
            return back()->with(['error' => "Não encontrou a nota de venda"]);
        }
        $totalProduto_processo = 0;
        $produto = Produto::find($request->id_produto);

        $request->validate([
            'quantidade' => ['required', 'Integer'],
            'id_produto' => ['required', 'Integer']
        ]);
        $data['where_itemVenda'] = [
            'status' => "processo",
            'id_produto' => $request->id_produto
        ];
        $data['item_venda'] = [
            'id_nota_venda' => $id,
            'id_usuario' => Auth::user()->id,
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantidade,
            'valor_compra' => $produto->item_compra->last()->valor_compra,
            'valor_venda' => $produto->item_compra->last()->valor_venda,
            'valor' => ($produto->item_compra->last()->valor_venda * $request->quantidade)
        ];

        if (ItemVenda::where(['id_nota_venda' => $id, 'id_produto' => $request->id_produto])->first()) {
            return back()->with(['error' => "Já adicionou este produto no carrinho"]);
        }

        if ($produto->quantidade < $request->quantidade) {
            return back()->with(['error' => "Quantidade Indisponivel"]);
        }

        $item_venda = ItemVenda::getTotalproduto($data['where_itemVenda']);
        if ($item_venda->count() >= 1) {
            foreach ($item_venda as $item) {
                $totalProduto_processo = $totalProduto_processo + $item->quantidade;
            }
        }
        $total_produtoDisponivel = $produto->quantidade - $totalProduto_processo;
        if ($total_produtoDisponivel < $request->quantidade) {
            return back()->with(['error' => "Quantidade Indisponivel"]);
        }

        if (ItemVenda::create($data['item_venda'])) {
            return back()->with(['success' => "Adicionado"]);
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