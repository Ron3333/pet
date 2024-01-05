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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('1era_comidad')->nullable();
            $table->string('2da_comidad')->nullable();
            $table->string('3era_comidad')->nullable();
            $table->string('4ta_comidad')->nullable();
            $table->string('actitud');
            $table->integer('cant_medicamento')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
