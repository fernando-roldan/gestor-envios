<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the users table
		Schema::create('lc_countries', function (Blueprint $table)
		{
		    $table->id();
    		$table->string('name', 255)->nullable();
    		$table->string('currency', 255)->nullable();
    		$table->string('currency_symbol', 3)->nullable();
    		$table->string('iso_3166_2', 2)->nullable();
    		$table->string('iso_3166_3', 3)->nullable();
    		$table->string('calling_code', 3)->nullable();
    		$table->string('flag')->nullable();
    		$table->string('currency_code', 255)->nullable();
    		$table->boolean('is_visible')->nullable();
    		$table->string('uid')->nullable(); // Agrega esta línea para el campo 'uid'
    		$table->timestamps();
		});

		Schema::create('country_states', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
			$table->foreignId('lc_country_id')->nullable()->constrained('lc_countries')->onDelete('cascade');
            $table->timestamps();
        });

		Schema::create('lc_countries_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lc_country_id')->constrained('lc_countries')->onDelete('cascade');
            $table->string('locale');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->unique(['lc_country_id', 'locale']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('lc_countries');
        Schema::dropIfExists('country_states');
		Schema::dropIfExists('lc_countries_translations');
	}

}
