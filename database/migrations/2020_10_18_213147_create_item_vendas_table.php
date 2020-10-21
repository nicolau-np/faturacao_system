<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_vendas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_nota_venda')->unsigned()->index();
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->bigInteger('id_produto')->unsigned()->index();
            $table->bigInteger('quantidade');
            $table->decimal('valor_compra', 10, 2);
            $table->decimal('valor_venda', 10, 2);
            $table->decimal('valor', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::table('item_vendas', function (Blueprint $table) {
            $table->foreign('id_nota_venda')->references('id')->on('nota_vendas')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreign('id_produto')->references('id')->on('produtos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_vendas');
    }
}