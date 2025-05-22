<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Customer::all()->each(function($customer) {
            CustomerContact::factory()->count(3)->create([
                'customer_id' => $customer->id,
            ]);
        });
    }
}
