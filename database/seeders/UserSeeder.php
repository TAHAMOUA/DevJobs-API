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
       User::factory()->create([
    'prenom' => 'Google',
    'nom' => 'Company',
    'email' => 'entreprise@devjobs.com',
    'password' => bcrypt('password'),
    'role' => 'entreprise',
]);

        // Candidats
       User::factory()->create([
    'prenom' => 'Taha',
    'nom' => 'Mouaddine',
    'email' => 'candidat@devjobs.com',
    'password' => bcrypt('password'),
    'role' => 'candidat',
]);
    }
}