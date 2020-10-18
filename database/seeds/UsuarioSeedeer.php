<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeedeer extends Seeder
{


    public function run()
    {

        DB::table('usuarios')->insert([
            [
                'id_pessoa' => 1,
                'username' => "nicolau.pungue",
                'password' => Hash::make("olamundo2015"),
                'estado' => "on",
                'nivel_acesso' => "admin"
            ],
            [
                'id_pessoa' => 1,
                'username' => "hebraim.zua",
                'password' => Hash::make("olaola"),
                'estado' => "on",
                'nivel_acesso' => "gerente"
            ],
            [
                'id_pessoa' => 1,
                'username' => "fernanda.rosa",
                'password' => Hash::make("babaca"),
                'estado' => "on",
                'nivel_acesso' => "caixa"
            ],
        ]);
    }
}