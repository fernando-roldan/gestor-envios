<?php

namespace Database\Factories;

use App\Models\HistoryShipping;
use App\Models\Quote;
use App\Models\Shipping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HistoryShippingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = HistoryShipping::class;

    public function definition(): array
    {
        return [
            'shipping_id' => Shipping::inRandomOrder()->first()?->id ?? Shipping::factory(),
            'quote_id' => Quote::inRandomOrder()->first()?->id, // puede ser null si no hay cotizaciones
            'status' => $this->faker->randomElement(['abierta', 'cerrada']),
            'total_price' => $this->faker->randomFloat(2, 100, 2000),
        ];
    }
}
