<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_vendas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->decimal('valor_total', 10, 4);
            $table->decimal('desconto', 10, 4);
            $table->decimal('valor_pago', 10, 4);
            $table->timestamps();
        });

        Schema::table('', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_vendas');
    }
}