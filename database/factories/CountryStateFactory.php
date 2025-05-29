<?php

namespace Database\Factories;

use App\Models\LcCountry;
use App\Models\CountryState;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CountryState>
 */
class CountryStateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CountryState::class;

    public function definition(): array
    {
        return [
            'name'  => $this->faker->state,
            'country_id'    => LcCountry::inRandomOrder()->first()?->id ?? LcCountry::factory(),
        ];
    }
}
