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
        
        Schema::create('quotes', function(Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_id')->constrained()->onDelete('cascade');
            $table->foreignId('provider_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);
            $table->text('description');
            $table->enum('status', ['pendiente', 'aceptada', 'rechazada'])->default('pendiente');
            $table->timestamps();
        });

        Schema::create('history_shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_id')->constrained()->onDelete('cascade');
            $table->foreignId('quote_id')->nullable()->constrained();
            $table->enum('status', ['abierta', 'cerrada']);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('history_shippings');
    }
};
