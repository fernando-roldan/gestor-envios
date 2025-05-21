<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Lwwcas\LaravelCountries\Abstract\CountrySeeder;
use Lwwcas\LaravelCountries\Models\Country as ModelsCountry;


class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $countries = [
            ['id' => 484, 'name' => 'Mexico'],
            ['id' => 840, 'name' => 'United States'],
            // Agrega más países aquí si es necesario
        ];

        foreach ($countries as $country) {
            // Usamos firstOrCreate para evitar duplicados
            ModelsCountry::firstOrCreate([
                'id' => $country['id'],
                'name' => $country['name'],
            ]);
        }
    }
}
