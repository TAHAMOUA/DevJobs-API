<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use App\Models\Offre;
use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprises = Entreprise::all();

        foreach ($entreprises as $entreprise) {

            Offre::factory()->count(3)->create([
                'entreprise_id' => $entreprise->id,
            ]);

        }
    }
}