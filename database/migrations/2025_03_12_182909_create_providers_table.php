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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->foreignId('country_code')->nullable()->constrained('lc_countries')->onDelete('cascade');
            $table->string('location')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();
            //$table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->foreignId('country_state')->constrained('country_states')->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->boolean('customs_agent')->nullable();
            $table->boolean('carrier')->nullable();
            $table->text('bio')->nullable();
            $table->foreignId('create_by')->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
