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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpersona')->nullable();
            $table->string('usuario')->unique();
            $table->string('clave');
            $table->boolean('habilitado')->default(true);
            $table->timestamps();
            $table->unsignedBigInteger('idrol');


            $table->foreign('idpersona')->references('id')->on('personas');
            $table->foreign('idrol')->references('idrol')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
