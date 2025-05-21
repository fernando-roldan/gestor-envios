<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\CountryState;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $provider = Provider::class;

    public function definition(): array
    {   
        //Obtener un usuario con rol de administrador al azar
        $AdminUser = User::where('role', 'admin')->inRandomOrder()->first(); 
        
        //Obtener un usuario con rol de proveedor al azar
        $ProviderUser = User::where('role', 'provider')->inRandomOrder()->first();
        
        $country = Country::inRadomOrder()->first() ?? Country::factory()->create();
        $state = $country->countryState()->inRadomOrder()->first() ?? CountryState::factory()->create(['country_id' => $country->id]);

        return [
            'name'          => fake()->name(),
            'user_id'       => $ProviderUser?->id,
            'phone'         => fake()->phoneNumber(),
            'country_code'  => $country,
            'location'      => fake()->country(),
            'postal_code'   => fake()->numberBetween(4),
            'address'       => fake()->address(),
            'country_state' => $state,
            'active'        => fake()->boolean(),
            'custom_agent'  => fake()->boolean(),
            'carrier'       => fake()->boolean(),
            'bio'           => fake()->text(),
            'create_by'     => $AdminUser,
        ];
    }
}
