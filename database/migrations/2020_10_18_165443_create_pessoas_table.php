<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_municipio')->unsigned()->index();
            $table->string('nome')->unique();
            $table->date('data_nascimento');
            $table->string('genero');
            $table->string('estado_civil');
            $table->string('naturalidade')->nullable();
            $table->bigInteger('telefone')->nullable();
            $table->string('bilhete')->nullable();
            $table->date('data_emissao')->nullable();
            $table->string('local_emissao')->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('comuna')->nullable();
            $table->timestamps();
        });

        Schema::table('pessoas', function (Blueprint $table) {
            $table->foreign('id_municipio')->references('id')->on('municipios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}