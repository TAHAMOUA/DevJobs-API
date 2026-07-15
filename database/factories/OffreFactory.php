<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->jobTitle(),
            'description' => fake()->paragraph(3),
            'type_contrat' => fake()->randomElement([
                'CDI',
                'CDD',
                'Stage',
                'Freelance',
            ]),
        ];
    }
}