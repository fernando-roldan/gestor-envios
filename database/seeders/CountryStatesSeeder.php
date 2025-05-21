<?php

namespace Database\Seeders;

use App\Models\CountryState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryStatesSeeder extends Seeder
{

    private $states = array(
        array('name' => "Aguascalientes",'lc_country_id' => 484),
		array('name' => "Baja California",'lc_country_id' => 484),
		array('name' => "Baja California Sur",'lc_country_id' => 484),
		array('name' => "Campeche",'lc_country_id' => 484),
		array('name' => "Chiapas",'lc_country_id' => 484),
		array('name' => "Chihuahua",'lc_country_id' => 484),
		array('name' => "Coahuila",'lc_country_id' => 484),
		array('name' => "Colima",'lc_country_id' => 484),
		array('name' => "Distrito Federal",'lc_country_id' => 484),
		array('name' => "Durango",'lc_country_id' => 484),
		array('name' => "Estado de Mexico",'lc_country_id' => 484),
		array('name' => "Guanajuato",'lc_country_id' => 484),
		array('name' => "Guerrero",'lc_country_id' => 484),
		array('name' => "Hidalgo",'lc_country_id' => 484),
		array('name' => "Jalisco",'lc_country_id' => 484),
		array('name' => "Mexico",'lc_country_id' => 484),
		array('name' => "Michoacan",'lc_country_id' => 484),
		array('name' => "Morelos",'lc_country_id' => 484),
		array('name' => "Nayarit",'lc_country_id' => 484),
		array('name' => "Nuevo Leon",'lc_country_id' => 484),
		array('name' => "Oaxaca",'lc_country_id' => 484),
		array('name' => "Puebla",'lc_country_id' => 484),
		array('name' => "Queretaro",'lc_country_id' => 484),
		array('name' => "Quintana Roo",'lc_country_id' => 484),
		array('name' => "San Luis Potosi",'lc_country_id' => 484),
		array('name' => "Sinaloa",'lc_country_id' => 484),
		array('name' => "Sonora",'lc_country_id' => 484),
		array('name' => "Tabasco",'lc_country_id' => 484),
		array('name' => "Tamaulipas",'lc_country_id' => 484),
		array('name' => "Tlaxcala",'lc_country_id' => 484),
		array('name' => "Veracruz",'lc_country_id' => 484),
		array('name' => "Yucatan",'lc_country_id' => 484),
		array('name' => "Zacatecas",'lc_country_id' => 484),
        array('name' => "Alabama",'lc_country_id' => 840),
		array('name' => "Alaska",'lc_country_id' => 840),
		array('name' => "Arizona",'lc_country_id' => 840),
		array('name' => "Arkansas",'lc_country_id' => 840),
		array('name' => "Byram",'lc_country_id' => 840),
		array('name' => "California",'lc_country_id' => 840),
		array('name' => "Cokato",'lc_country_id' => 840),
		array('name' => "Colorado",'lc_country_id' => 840),
		array('name' => "Connecticut",'lc_country_id' => 840),
		array('name' => "Delaware",'lc_country_id' => 840),
		array('name' => "District of Columbia",'lc_country_id' => 840),
		array('name' => "Florida",'lc_country_id' => 840),
		array('name' => "Georgia",'lc_country_id' => 840),
		array('name' => "Hawaii",'lc_country_id' => 840),
		array('name' => "Idaho",'lc_country_id' => 840),
		array('name' => "Illinois",'lc_country_id' => 840),
		array('name' => "Indiana",'lc_country_id' => 840),
		array('name' => "Iowa",'lc_country_id' => 840),
		array('name' => "Kansas",'lc_country_id' => 840),
		array('name' => "Kentucky",'lc_country_id' => 840),
		array('name' => "Louisiana",'lc_country_id' => 840),
		array('name' => "Lowa",'lc_country_id' => 840),
		array('name' => "Maine",'lc_country_id' => 840),
		array('name' => "Maryland",'lc_country_id' => 840),
		array('name' => "Massachusetts",'lc_country_id' => 840),
		array('name' => "Medfield",'lc_country_id' => 840),
		array('name' => "Michigan",'lc_country_id' => 840),
		array('name' => "Minnesota",'lc_country_id' => 840),
		array('name' => "Mississippi",'lc_country_id' => 840),
		array('name' => "Missouri",'lc_country_id' => 840),
		array('name' => "Montana",'lc_country_id' => 840),
		array('name' => "Nebraska",'lc_country_id' => 840),
		array('name' => "Nevada",'lc_country_id' => 840),
		array('name' => "New Hampshire",'lc_country_id' => 840),
		array('name' => "New Jersey",'lc_country_id' => 840),
		array('name' => "New Jersy",'lc_country_id' => 840),
		array('name' => "New Mexico",'lc_country_id' => 840),
		array('name' => "New York",'lc_country_id' => 840),
		array('name' => "North Carolina",'lc_country_id' => 840),
		array('name' => "North Dakota",'lc_country_id' => 840),
		array('name' => "Ohio",'lc_country_id' => 840),
		array('name' => "Oklahoma",'lc_country_id' => 840),
		array('name' => "Ontario",'lc_country_id' => 840),
		array('name' => "Oregon",'lc_country_id' => 840),
		array('name' => "Pennsylvania",'lc_country_id' => 840),
		array('name' => "Ramey",'lc_country_id' => 840),
		array('name' => "Rhode Island",'lc_country_id' => 840),
		array('name' => "South Carolina",'lc_country_id' => 840),
		array('name' => "South Dakota",'lc_country_id' => 840),
		array('name' => "Sublimity",'lc_country_id' => 840),
		array('name' => "Tennessee",'lc_country_id' => 840),
		array('name' => "Texas",'lc_country_id' => 840),
		array('name' => "Trimble",'lc_country_id' => 840),
		array('name' => "Utah",'lc_country_id' => 840),
		array('name' => "Vermont",'lc_country_id' => 840),
		array('name' => "Virginia",'lc_country_id' => 840),
		array('name' => "Washington",'lc_country_id' => 840),
		array('name' => "West Virginia",'lc_country_id' => 840),
		array('name' => "Wisconsin",'lc_country_id' => 840),
		array('name' => "Wyoming",'lc_country_id' => 840),
    );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->states as $key => $state) {
            if(!CountryState::where('name', $state['name'])->first())
            CountryState::create([
                 'name' => $state['name'],
                 'lc_country_id' => $state['lc_country_id']
             ]);
         }
    }
}
