<?php

namespace Database\Factories;

use App\Models\Ville;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'addresse' => $this->faker->streetAddress(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_de_naissance' => $this->faker->date(),
            'ville_id' => $this->faker->numberBetween(1, 15)
        
        ];
    }
}
