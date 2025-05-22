<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUsers = User::role(['admin', 'super-admin'])->get();

        if ($adminUsers->isEmpty()) {
            $this->command->warn('No hay usuarios con rol de administrador o super administrador.');
            return;
        }

        for($i = 0; $i < 10; $i++) {

            $admin = $adminUsers->random();

            Product::factory()->create([
                'create_by' => $admin->id
            ]);
        }
    }
}
