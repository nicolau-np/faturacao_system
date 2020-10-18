<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoProdutoSeedeer extends Seeder
{

    static $tipo_produtos = [
        "Pericível",
        "Não Pericível"
    ];

    public function run()
    {
        foreach (Self::$tipo_produtos as $tipo_produto) {
            DB::table('tipo_produtos')->insert([
                'tipo' => $tipo_produto
            ]);
        }
    }
}