<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CustomerSeeder extends Seeder
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

        // Crear 10 clientes
        for ($i = 0; $i < 10; $i++) {
            $admin = $adminUsers->random(); // Asegurado: es un modelo, no colección

            Customer::factory()->create([
                'create_by' => $admin->id,
                'updated_by' => $admin->id, // Puedes omitir este si prefieres null
            ]);
        }
    }
}
