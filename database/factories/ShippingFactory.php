<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Quote;
use App\Models\Shipping;
use App\Models\Status;
use App\Models\User;
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
            'uuid' => $this->faker->uuid(),
            'customer_id' => Customer::inRandomOrder()->value('id'),
            'status_id' => Status::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->value('id'),
            'currency' => $this->faker->currencyCode(),
            'cost' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->randomFloat(2, 10, 100)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function($shipping) {
            Quote::factory()->create([
                'shipping_id' => $shipping->id,
            ]);
        });
    }
}
