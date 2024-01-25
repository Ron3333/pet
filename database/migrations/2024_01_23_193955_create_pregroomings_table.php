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
            $table->decimal('depósito_inicial', 10, 2);
            $table->string('fecha');
            $table->string('nudos');
            $table->text('observaciones');
            $table->string('perro');
            $table->string('tipo_groming');
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
