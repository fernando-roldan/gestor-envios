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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('create_by')->constrained('users')->onDelete('cascade');
            $table->string('cust_num', 45);
            $table->integer('cust_seq');
            $table->string('name');
            $table->string('city')->nullable();
            $table->string('state', 5);
            $table->integer('zip');
            $table->string('country', 45);
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('customer_contacts', function (Blueprint $table){
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email')->unique();
            $table->string('phone', 50)->unique();
            $table->string('phone_2', 50)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_contacts');
    }
};
