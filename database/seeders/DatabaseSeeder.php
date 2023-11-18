<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EmergencyContact;
use App\Models\ParticipantType;
use App\Models\Proximity;
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
        User::create([
            'name' => 'Admin',
            'email' => 'alihan2@metatige.com',
            'phone' => 5464971229,
            'gender' => 1,
            'blood_group' => 7,
            'birthdate' => "1997-10-12",
            'image' => 'http://127.0.0.1:8000/storage/uploads/tLSo19xG5P3srs5wrDhT5QIfjvwHnucHNdvopz0F.jpg',
            'country' => 'Türkiye',
            'city' => 'Ankara',
            'district' => 'Yenimahalle',
            'address' => 'güzelyaka mah. 542 sok. 7/0',
            'height' => 174,
            'weight' => 64,
            'role' => 3,
            'type' => 1,
            'created_by' => 1,
            'status' => 1
        ]);

        EmergencyContact::create([
            'user' => 2,
            'name' => 'Admin',
            'proximity' => 1,
            'phone' => 5464971229
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

        Proximity::create([
            "name" => "Anne"
        ]);
        Proximity::create([
            "name" => "Baba"
        ]);
        Proximity::create([
            "name" => "Kardeş"
        ]);
        Proximity::create([
            "name" => "Kuzen"
        ]);
        Proximity::create([
            "name" => "Teyze/Hala"
        ]);
        Proximity::create([
            "name" => "Amca/Dayı"
        ]);
        Proximity::create([
            "name" => "Büyük Anne"
        ]);
        Proximity::create([
            "name" => "Büyük Baba"
        ]);
        Proximity::create([
            "name" => "Arkadaş"
        ]);
    }
}
