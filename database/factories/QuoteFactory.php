<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\Quote;
use App\Models\Shipping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Quote::class;

    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 10, 100);
        $total = $price + $this->faker->randomFloat(2, 10, 100);

        return [
            'shipping_id' => Shipping::inRandomOrder()->first()?->id ?? Shipping::factory(),
            'provider_id' => Provider::factory(),
            'price' => $price,
            'total' => $total,
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pendiente', 'aceptada', 'rechazada']),
        ];
    }
}
