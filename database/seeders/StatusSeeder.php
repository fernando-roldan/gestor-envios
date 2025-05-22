<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Sin Asignar',
            'en transito MX',
            'Transito USA',
            'entregado',
            'en aduana',
            'en almacen USA',
            'en almacen MX',
            'cancelado',
        ];

        foreach ($statuses as $status) {
            Status::firstOrCreate(['name' => $status]);
        }
    }
}
