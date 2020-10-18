<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_compras', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->bigInteger('id_produto')->unsigned()->index();
            $table->bigInteger('id_nota_compra')->unsigned()->index();
            $table->bigInteger('quantidade');
            $table->decimal('valor', 10,4);
            $table->timestamps();
        });

        Schema::table('item_compras', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreign('id_produto')->references('id')->on('produtos')->onUpdate('cascade');
            $table->foreign('id_nota_compra')->references('id')->on('nota_compras')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_compras');
    }
}