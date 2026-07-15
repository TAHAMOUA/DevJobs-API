<?php

namespace Database\Seeders;

use App\Models\Competence;
use Illuminate\Database\Seeder;

class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competences = [
            'PHP',
            'Laravel',
            'JavaScript',
            'React',
            'Vue.js',
            'MySQL',
            'Docker',
            'Git',
            'HTML',
            'CSS',
        ];

        foreach ($competences as $competence) {
            Competence::create([
                'nom' => $competence,
            ]);
        }
    }
}