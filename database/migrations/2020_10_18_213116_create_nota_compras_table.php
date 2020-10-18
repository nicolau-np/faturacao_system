<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_compras', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario')->unsigned()->index();
            $table->decimal('valor_total', 10,2);
            $table->date('data_emissao');
            $table->date('data_vencimento');
            $table->decimal('desconto', 10,2);
            $table->decimal('valor_pago', 10,2);
            $table->timestamps();
        });

        Schema::table('nota_compras', function (Blueprint $table) {
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
        Schema::dropIfExists('nota_compras');
    }
}