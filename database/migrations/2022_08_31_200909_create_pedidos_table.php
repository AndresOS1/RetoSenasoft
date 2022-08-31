<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('articulo_id');
            $table->string('direccion_envio');
            $table->string('fecha_pedido');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('articulo_id')->references('id_articulo')->on('articulos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
