<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisSeedeer::class,
            ProvinciaSeedeer::class,
            MunicipioSeedeer::class,
            CargoSeedeer::class,
            PessoaSeedeer::class,
            FuncionarioSeedeer::class,
            UsuarioSeedeer::class,
        ]);
       
    }
}