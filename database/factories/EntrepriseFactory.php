<?php

namespace Database\Factories;

use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Entreprise>
 */
class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'nom' => fake()->company(),
        'secteur' => fake()->randomElement([
            'Informatique',
            'Finance',
            'Santé',
            'Marketing'
        ]),
        'description' => fake()->paragraph(),
        'logo' => fake()->imageUrl(),
        'user_id' => User::factory(),
    ];
}
}
