<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('apellidos',200);
            $table->string('correo',200);
            $table->string('telefono',200);
            $table->string('calle',200);
            $table->string('ciudad',200);
            $table->string('estado',200);
            $table->string('cp',200);
            $table->integer('estadoC');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
