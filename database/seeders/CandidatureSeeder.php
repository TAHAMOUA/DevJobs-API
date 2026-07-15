<?php

namespace Database\Seeders;

use App\Models\Candidature;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Seeder;

class CandidatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidats = User::where('role', 'candidat')->get();
        $offres = Offre::all();

        foreach ($candidats as $candidat) {

            $offresChoisies = $offres->random(min(2, $offres->count()));

            foreach ($offresChoisies as $offre) {

                Candidature::create([
                    'statut' => fake()->randomElement([
                        'En attente',
                        'Acceptee',
                        'Refusee',
                    ]),
                    'date_candidature' => fake()->date(),
                    'user_id' => $candidat->id,
                    'offre_id' => $offre->id,
                ]);

            }
        }
    }
}