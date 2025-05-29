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
            ['id' => 484, 
             'name' => 'Mexico',
             'currency' => 'Mexican peso', 
             'currency_symbol' => '$', 
             'iso_3166_2' => 'MX',
             'iso_3166_3' => 'MEX',
             'calling_code' => '52',
             'flag' => 'MX.png',
             'currency_code' => 'MXN',
             'is_visible' => true, 
            ],
            ['id' => 840, 
             'name' => 'United States', 
             'currency' => 'US dollar', 
             'currency_symbol' => '$', 
             'iso_3166_2' => 'US',
             'iso_3166_3' => 'USA',
             'calling_code' => '1',
             'flag' => 'US.png',
             'currency_code' => 'USD',
             'is_visible' => true,
            ],
            // Agrega más países aquí si es necesario
        ];

        foreach ($countries as $countryId => $country) {
            // Usamos firstOrCreate para evitar duplicados
            ModelsCountry::firstOrCreate([
                'id' => $countryId,
                'name' => $country['name'],
                'currency' => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_symbol' => ((isset($country['currency_symbol'])) ? $country['currency_symbol'] : null),
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'calling_code' => $country['calling_code'],
                'flag' =>((isset($country['flag'])) ? $country['flag'] : null),
                'is_visible' => $country['is_visible'],
            ]);
            /* DB::table('countries')->insert(array(
                'id' => $countryId,
                'name' => $country['name'],
                'currency' => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_symbol' => ((isset($country['currency_symbol'])) ? $country['currency_symbol'] : null),
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'calling_code' => $country['calling_code'],
                'flag' =>((isset($country['flag'])) ? $country['flag'] : null),
                'is_visible' => $country['is_visible'],
            )); */
        }
    }
}
