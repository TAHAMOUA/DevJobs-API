<?php

namespace Database\Factories;

use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'statut' => fake()->randomElement([
                'En attente',
                'Acceptee',
                'Refusee',
            ]),
            'date_candidature' => fake()->date(),
            'user_id' => User::factory(),
            'offre_id' => Offre::factory(),
        ];
    }
}