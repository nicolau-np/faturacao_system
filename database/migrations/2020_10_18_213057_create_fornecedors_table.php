<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_municipio')->unsigned()->index();
            $table->string('entidade')->unique();
            $table->text('descricao')->nullable();
            $table->bigInteger('telefone');
            $table->string('endereco');
            $table->timestamps();
        });

        Schema::table('fornecedors', function (Blueprint $table) {
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
        Schema::dropIfExists('fornecedors');
    }
}