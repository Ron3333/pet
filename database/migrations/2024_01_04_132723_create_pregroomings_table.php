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
        Schema::create('pregroomings', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->string('perro');
            $table->string('nudos');
            $table->string('observaciones');
            $table->string('deposito_inicial');
            $table->string('tipo_grooming'); //porque no esta tabla groomings
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregroomings');
    }
};
