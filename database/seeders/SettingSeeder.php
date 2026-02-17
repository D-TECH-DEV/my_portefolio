<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name' => 'You-Soft Portfolio',
            'site_slogan' => 'Réinventons le futur ligne par ligne',
            'site_description' => 'Portfolio professionnel de Youssouf Doumdje, développeur full-stack spécialisé en Laravel, Flutter et Spring Boot.',
            'contact_email' => 'dydoumdje2004@gmail.com',
            'contact_phone' => '+225 07 89 68 16 13',
            'contact_address' => 'CI Yakro 220 logement',
            'meta_title' => 'You-Soft | Développeur Full-Stack à Abidjan',
            'meta_description' => "Portfolio de Youssouf Doumdje, développeur full-stack spécialisé en développement web et mobile. Services de programmation, design et maintenance informatique en Côte d'Ivoire.",
            'meta_keywords' => 'développeur web, Laravel, Flutter, Abidjan, Côte d\'Ivoire, programmation',
            'social_github' => 'https://github.com/youssouf-doumdje',
            'social_linkedin' => 'https://linkedin.com/in/youssouf-doumdje',
            'social_twitter' => 'https://twitter.com/youssouf_doumdje',
            'social_facebook' => 'https://facebook.com/youssouf_doumdje',
            'social_instagram' => 'https://instagram.com/youssouf_doumdje',
            'robots_content' => 'index, follow',
            'canonical_url' => 'https://yousoft.com',
            'og_title' => 'You-Soft | Expert Laravel & Flutter',
            'og_description' => 'Découvrez mes réalisations et services en développement web et mobile.',
            'twitter_card' => 'summary_large_image',
            'twitter_site' => '@yousoft_dev',
            'google_site_verification' => 'your-verification-code',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
