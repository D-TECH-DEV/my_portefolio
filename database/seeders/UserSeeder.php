<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Youssouf Doumdje',
            'email' => 'dydoumdje2004@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Dtech@2004'),
            'job_title' => 'Développeur Full-Stack',
            'bio' => 'Fondateur de You-Soft, je conçois des solutions digitales innovantes et performantes. Passionné par le développement web et mobile, je combine programmation, maintenance informatique et design numérique pour créer des outils qui travaillent pour votre activité 24h/24.',
            'phone' => '+225 07 89 68 16 13',
            'location' => "Abidjan, Côte d'Ivoire",
            'company_name' => 'You-Soft',
            'website' => 'https://you-soft.ci',
            'years_experience' => 4,
            'completed_projects' => 12,
            'availability' => 'Disponible pour de nouveaux projets',
            'social_github' => 'https://github.com/yousoft',
            'social_linkedin' => 'https://linkedin.com/in/youssouf-doumdje',
        ]);
    }
}
