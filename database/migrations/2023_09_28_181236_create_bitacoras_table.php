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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id('idbitacora');
            $table->unsignedBigInteger('idusuario');
            $table->date('fecha');
            $table->time('hora');
            $table->ipAddress('ip');
            $table->string('so');
            $table->string('navegador');
            $table->string('usuario');
            $table->timestamps();


            $table->foreign('idusuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
};
