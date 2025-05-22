<?php

namespace Database\Seeders;

use App\Models\HistoryShipping;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provider = User::role('provider')->get();

        if($provider->isEmpty()) {

            $this->command->warn('No hay usuarios con rol de administrador y super administrador');
            return;
        }

        foreach($provider as $user) {
            
            Shipping::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}
