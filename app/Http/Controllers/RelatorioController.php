<?php

namespace App\Http\Controllers;

use App\NotaVenda;
use PDF;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    
    public function fatura($id_notaVenda){
        $nota_venda = NotaVenda::find($id_notaVenda);
        if(!$nota_venda){
            return back()->with(['error'=>"Não encontrou nota de venda"]);
        }
        
        $data = [
            'title'=>"Fatura",
            'getNotaVenda'=>$nota_venda
        ];
        $pdf = PDF::loadView('relatorio.fatura', $data);

        return $pdf->stream('fatura -' . date('Y') . '.pdf');
    }
    
}