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
        Schema::table('users', function (Blueprint $table) {
            $table->string('administrador')->nullable();
            $table->integer('cant_perro')->nullable();
            $table->string('activar_horario_especial')->nullable();
            $table->decimal('costo_feriado', 10, 2)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn(['admin', 'cant_perro', 'activar_horario_especial', 'costo_feriado']);
           });
    }
};
