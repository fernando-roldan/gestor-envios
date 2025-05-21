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
        Schema::create('letters_instructions', function (Blueprint $table) {
            //$table->id();
            $table->integer('id_boarding');
            $table->integer('suffixx');
            $table->string('bill');
            $table->decimal('net_weight', 10, 2);
            $table->decimal('gross_weight', 10, 2);
            $table->string('pallet', 50);
            $table->string('pallet_2', 50)->nullable();
            $table->string('pallet_3', 50)->nullable();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->mediumText('referrals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters_instructions');
    }
};
