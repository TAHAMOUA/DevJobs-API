<?php

namespace Database\Seeders;

use App\Models\Competence;
use App\Models\Offre;
use Illuminate\Database\Seeder;

class OffreCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competences = Competence::all();

        foreach ($offres = Offre::all() as $offre) {

            $ids = $competences
                ->random(rand(2, 4))
                ->pluck('id')
                ->toArray();

            $offre->competences()->attach($ids);
        }
    }
}