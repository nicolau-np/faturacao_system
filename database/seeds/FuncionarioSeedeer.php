<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioSeedeer extends Seeder
{
    static $funcionarios = [
        [
            'id_pessoa' => 1,
            'id_cargo' => 1,
            'estado' => "on"
        ],
        [
            'id_pessoa' => 2,
            'id_cargo' => 2,
            'estado' => "on"
        ],
        [
            'id_pessoa' => 3,
            'id_cargo' => 3,
            'estado' => "on"
        ],
    ];
    public function run()
    {
        foreach (Self::$funcionarios as $funcionario) {
            DB::table('funcionarios')->insert(
                $funcionario
            );
        }
    }
}