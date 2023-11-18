<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ParticipantType;
use App\Models\User;
use App\Models\System;
use Illuminate\Database\Seeder;

use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'alihan@metatige.com',
            'password' => Hash::make('alihan12'),
            'role' => 1,
            'status' => 1
        ]);

        System::create([
            'site_name' => 'Erasmus',
            'site_url' => 'https://localhost/',
            'site_description' => 'Metatige',
            'site_keywords' => 'Metatige',
            'site_lang' => 'tr',
            'site_currency' => 'TRY',
            'site_timezone' => 'UTC',
            'favicon' => '/assets/images/metatige/metatige-hdark.png',
            'logo_primary' => '/assets/images/metatige/metatige-vlight.png',
            'logo_secondary' => '/assets/images/metatige/metatige-vlight.png',
            'status' => 1
        ]);

        ParticipantType::create([
            "name" => "Öğrenci"
        ]);
        ParticipantType::create([
            "name" => "Öğretmen"
        ]);
        ParticipantType::create([
            "name" => "Gözetmen"
        ]);
        ParticipantType::create([
            "name" => "Danışman"
        ]);
        ParticipantType::create([
            "name" => "Personel"
        ]);
        ParticipantType::create([
            "name" => "Uzman"
        ]);
        ParticipantType::create([
            "name" => "Yetişkin"
        ]);
    }
}
