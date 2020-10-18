<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_classe_produto')->unsigned()->index();
            $table->bigInteger('id_tipo')->unsigned()->index();
            $table->string('nome')->unique();
            $table->text('descricao')->nullable();
            $table->decimal('valor_compra', 10,2);
            $table->decimal('valor_venda', 10,2);
            $table->date('data_caducidade')->nullable();
            $table->bigInteger('quantidade');
            $table->text('codigo_barra')->nullable();
            $table->text('codigo_qr')->nullable();
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('id_classe_produto')->references('id')->on('classe_produtos')->onUpdate('cascade');
            $table->foreign('id_tipo')->references('id')->on('tipo_produtos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}