<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customer::class;
    
    public function definition(): array
    {
        // $adminUser = User::role(['admin', 'super-admin'])->get();

        return [
            // 'create_by' => $adminUser ? $adminUser->id : User::factory(),
            'cust_num' => $this->faker->unique()->bothify('######'),
            'cust_seq' => $this->faker->numberBetween(1, 99999),
            'name' => $this->faker->company(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr,
            'zip' => $this->faker->numberBetween(1000, 9999),
            'country' => $this->faker->country,
            'address' => $this->faker->streetAddress,
            'address_2' => $this->faker->optional()->secondaryAddress,
            // 'update_by' => $adminUser ? $adminUser->id : null,
        ];
    }
}
