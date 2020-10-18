<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeedeer extends Seeder
{
    static $cargos = [
        "PCA",
        "Gerente",
        "Caixa",
        "Segurança",
        "Empregada de Limpesa"
    ];

    public function run()
    {
        foreach (Self::$cargos as $cargo) {
            DB::table('cargos')->insert([
                'cargo' => $cargo
            ]);
        }
    }
}