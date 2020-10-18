<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = [
            'title'=>"Sistema de Facturção",
            'menu'=>"Home",
            'submenu'=>"",
            'type'=>"home"  
          ];
          
        return view("home", $data);
    }
}