<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function grafico(){
        return view("grafico.grafico");
    }
}