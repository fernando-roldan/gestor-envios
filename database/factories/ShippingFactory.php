<?php

namespace Database\Factories;

use App\Models\Shipping;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipping>
 */
class ShippingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Shipping::class;

    public function definition(): array
    {
        return [
            //
            /* 'uuid' => Str::uuid(),
            'customer_id' => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
            'status_id' => Status::inRandomOrder()->first()?->id ?? Status::factory(),
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'currency' => $this->faker->randomElement(['USD', 'MXN']),
            'cost' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->randomFloat(2, 1, 100), */
        ];
    }
}
