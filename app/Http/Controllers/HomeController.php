<?php

namespace App\Http\Controllers;

use App\NotaVenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['nota_venda'] = [
            'status' => "processo",
            'id_usuario' => Auth::user()->id
        ];

        $carrinho = NotaVenda::where($data['nota_venda'])->get();

        $data = [
            'title' => "Sistema de Facturção",
            'menu' => "Home",
            'submenu' => "",
            'type' => "home",
            'getNotaVenda' => $carrinho
        ];

        return view("home", $data);
    }
}
