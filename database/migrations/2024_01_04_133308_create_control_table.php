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
        Schema::create('control', function (Blueprint $table) {
            $table->id();
            $table->string('comidas_al_dìa');
            $table->string('admin');
            $table->string('cuenta_sms');
            $table->string('precio_feriado');
            $table->string('desabilitar_horas');
            $table->string('descripción_feriado');
            $table->string('enviar_mensaje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control');
    }
};
