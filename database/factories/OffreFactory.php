<?php

namespace Database\Factories;

use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titre' => fake()->jobTitle(),
            'description' => fake()->paragraph(3),
            'type_contrat' => fake()->randomElement([
                'CDI',
                'CDD',
                'Stage',
                'Freelance'
            ]),
            'entreprise_id' => Entreprise::factory(),
        ];
    }
}