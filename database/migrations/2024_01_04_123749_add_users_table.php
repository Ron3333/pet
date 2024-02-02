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
            $table->string('activar_horario_especial')->nullable();
            $table->string('administrador')->nullable();
            $table->string('apellido')->nullable();
            $table->integer('cant_perro')->nullable();
            $table->decimal('costo_dias_feriado', 10, 2)->unsigned()->nullable();
            $table->decimal('costo_dias_normales', 10, 2)->unsigned()->nullable();
            $table->decimal('costo_hospedaje', 10, 2)->unsigned()->nullable();
            $table->integer('codigo_de_verificacion')->nullable();
            $table->string('descuento_primer_dia')->nullable();
            $table->string('descuento_primer_dia_feriado')->nullable();
            $table->string('descuento ultimo dia')->nullable();
            $table->string('descuento_ultimo_dia_feriado')->nullable();
            $table->integer('dias_feriados')->nullable();
            $table->integer('dias_hospedaje')->nullable();
            $table->integer('dias_normales')->nullable();
            $table->datetime('fecha_busqueda')->nullable();
            $table->datetime('fecha_llegada')->nullable();
            $table->datetime('fecha_fin_feriado')->nullable();
            $table->datetime('fecha_inicio_feriado')->nullable();
            $table->datetime('fecha_feriado_rango_fin')->nullable();
            $table->datetime('fecha_feriado_rango_Inicio')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->string('idioma')->nullable();
            $table->string('multiples_groomings')->nullable();
            $table->string('persona')->nullable();
            $table->decimal('precio_descuento_primer_dia', 10, 2)->unsigned()->nullable();
            $table->decimal('precio_descuento_ultimo_dia', 10, 2)->unsigned()->nullable();
            $table->string('selección_de_perro')->nullable();
            $table->string('telefono')->nullable();
           

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
