<?php

namespace App\Http\Controllers;

use App\NotaVenda;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index($id)
    {
        $nota_venda = NotaVenda::find($id);
        if (!$nota_venda) {
            return back()->with(['error' => "Não encontrou a nota de venda"]);
        }
        $data = [
            'title' => "Vendas",
            'menu' => "Vendas",
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
            
        ]);
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