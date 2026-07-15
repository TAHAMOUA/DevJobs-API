<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'prenom' => 'Admin',
            'nom' => 'System',
            'email' => 'admin@devjobs.com',
            'role' => 'admin',
        ]);

        // Entreprises
        User::factory()
            ->count(5)
            ->create([
                'role' => 'entreprise',
            ]);

        // Candidats
        User::factory()
            ->count(20)
            ->create([
                'role' => 'candidat',
            ]);
    }
}