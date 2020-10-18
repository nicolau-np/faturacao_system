<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseProdutoSeedeer extends Seeder
{

    static $classe_produtos = [
        "Conservas",
        "Bolachas",
        "Biscoitos",
        "Bebidas Alcoolicas",
        "Bebidas Não Alcoolicas",
        "Água",
    ];

    public function run()
    {
        foreach (Self::$classe_produtos as $classe_produto) {
            DB::table('classe_produtos')->insert([
                'classe' => $classe_produto
            ]);
        }
    }
}