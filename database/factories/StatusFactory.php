<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Status::class;

    public function definition(): array
    {
        $status = ['Sin Asignar', 'en transito MX', 'Transito USA', 'entregado', 'en aduana', 'en almacen USA', 'en almacen MX', 'cancelado'];
        
        return [
            'name' => $this->faker->randomElement($status),
        ];
    }
}
