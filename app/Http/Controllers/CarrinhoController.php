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

        if($nota_venda->status == "terminado"){
            return back()->with(['error'=>"Já finalizou esta venda"]);
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

    public function destroy($id_item_venda)
    {
        $item_venda = ItemVenda::find($id_item_venda);
        if (!$item_venda) {
            return back()->with(['error' => "Não encontrou este item no carrinho"]);
        }
        
        if($item_venda->nota_venda->status == "terminado"){
            return back()->with(['error'=>"Já finalizou esta venda"]);
        }

        if (ItemVenda::find($id_item_venda)->delete()) {
            return back()->with(['success' => "Produto eliminado com sucesso"]);
        }
    }

    public function increment($id_item_venda)
    {
        $total_produtoDisponivel = 0;
        $totalProduto_processo = 0;
        $nova_quantidade = 0;
        $item_venda = ItemVenda::find($id_item_venda);
        if (!$item_venda) {
            return back()->with(['error' => "Não encontrou este item no carrinho"]);
        }

        if($item_venda->nota_venda->status == "terminado"){
            return back()->with(['error'=>"Já finalizou esta venda"]);
        }

        $data['item_venda'] = [
            'valor' => null
        ];
        $data['where_itemVenda'] = [
            'status' => "processo",
            'id_produto' => $item_venda->id_produto
        ];

        $nova_quantidade = $item_venda->quantidade + 1;
        $produto = Produto::find($item_venda->id_produto);

        if ($produto->quantidade < 1) {
            return back()->with(['error' => "Quantidade Indisponivel"]);
        }

         $item_venda = ItemVenda::getTotalproduto($data['where_itemVenda']);
        if ($item_venda->count() >= 1) {
            foreach ($item_venda as $item) {
                $totalProduto_processo = $totalProduto_processo + $item->quantidade;
            }
        }

        $total_produtoDisponivel = $produto->quantidade - $totalProduto_processo;
        if ($total_produtoDisponivel < 1) {
            return back()->with(['error' => "Quantidade Indisponivel"]);
        }

        if (ItemVenda::find($id_item_venda)->increment('quantidade', 1)) {
            $data['item_venda']['valor'] = ($produto->item_compra->last()->valor_venda * $nova_quantidade);
            if (ItemVenda::find($id_item_venda)->update($data['item_venda'])) {
                return back()->with(['success' => "Adicionou uma quantidade em " . $produto->nome]);
            }
        }
    }

    public function decrement($id_item_venda)
    {
        $nova_quantidade = 0;
        $item_venda = ItemVenda::find($id_item_venda);
        if (!$item_venda) {
            return back()->with(['error' => "Não encontrou este item no carrinho"]);
        }

        if($item_venda->nota_venda->status == "terminado"){
            return back()->with(['error'=>"Já finalizou esta venda"]);
        }

        if ($item_venda->quantidade <= 1) {
            return back()->with(['error' => "Já não pode descontar mais"]);
        }
        $data = [
            'valor' => null
        ];
        $nova_quantidade = $item_venda->quantidade - 1;
        if (ItemVenda::find($id_item_venda)->decrement('quantidade', 1)) {
            $produto = Produto::find($item_venda->id_produto);
            $data['valor'] = ($produto->item_compra->last()->valor_venda * $nova_quantidade);
            if (ItemVenda::find($id_item_venda)->update($data)) {
                return back()->with(['success' => "Descontou uma quantidade em " . $produto->nome]);
            }
        }
    }

    public function finalizar(Request $request, $id_notaVenda)
    {
        $nota_venda = NotaVenda::find($id_notaVenda);
        if(!$nota_venda){
            return back()->with(['error'=>"Nota de venda não encontrada"]);
        }

        if($nota_venda->status == "terminado"){
            return back()->with(['error'=>"Já finalizou esta venda"]);
        }

        $request->validate([
            'total_venda'=>['required', 'numeric']
        ]);
        
        $data['nota_venda'] = [
            'valor_total'=>$request->total_venda,
            'desconto'=>$request->desconto,
            'status'=>"terminado"
        ];

        if(NotaVenda::find($id_notaVenda)->update($data['nota_venda'])){
            $itens_venda = ItemVenda::where('id_nota_venda', $id_notaVenda)->get();
            foreach($itens_venda as $item){
                Produto::find($item->id_produto)->decrement('quantidade', $item->quantidade);
            }
            return back()->with(['success'=>"Compra Terminada com sucesso"]);
        }
    }
}