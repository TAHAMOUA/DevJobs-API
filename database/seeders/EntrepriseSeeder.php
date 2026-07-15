<?php

namespace Database\Seeders;

use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entreprisesUsers = User::where('role', 'entreprise')->get();

        foreach ($entreprisesUsers as $user) {

            Entreprise::factory()->create([
                'user_id' => $user->id,
            ]);

        }
    }
}