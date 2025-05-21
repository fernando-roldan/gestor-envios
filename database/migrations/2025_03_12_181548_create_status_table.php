<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //agente aduanla o transportista, ambos pueden tener los dos
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['Sin Asignar', 'en transito MX', 'Transito USA', 'entregado', 'en aduana', 'en almacen USA', 'en almacen MX', 'cancelado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
