<?php

namespace Database\Seeders;

use App\Models\Shipping;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //$this->call(RolesSeeder::class);
        $this->call([
            RoleAndPermissionsSedeer::class,
            CountriesSeeder::class,
            CountryStatesSeeder::class,
            CustomerSeeder::class,
            CustomerContactSeeder::class,
            StatusSeeder::class,
            ProductSeed::class,
            ShippingSeeder::class,
            HistoryShippingSeeder::class
        ]);

        //Shipping::factory(5)->create();
    }
}
