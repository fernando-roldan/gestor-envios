<?php

namespace Database\Seeders;

use App\Models\HistoryShipping;
use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shipping::factory()
                ->count(10)
                ->create()
                ->each(function($shipping) {
                    HistoryShipping::factory()
                        ->count(2)
                        ->create(['shipping_id' => $shipping->id]);
                });
    }
}
