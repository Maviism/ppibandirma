<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Event;
use App\Models\NipCounter;
use App\Models\Opinion;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user1 = User::create([
            'name' => "Super admin",
            'email' => "super-admin@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'super-admin',
        ]);

        $user1->identity()->create([
            'faculty' => 'teknik komputer',
            'gender' => 'l',
            'phone_number' => '905525911215',
            'user_id' => $user1->id,
            'date_of_birth' => '20/20/1999',
            'university' => 'Bandirma onyedi eylul',
            'married' => 'belum',
            'student_no' => '201502209',
        ]);


        Event::create([
            'event_name' => "Jumat berkah",
            'slug' => "jumat-berkah",
            'place' => "Rumah fulan",
            'date' => now(),
            'thumbnail' => "jumber.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Event::create([
            'event_name' => "Podcast PPI BANDIRMA",
            'slug' => 'podcast-ppi-bandirma',
            'place' => "Spotify",
            'date' => now(),
            'thumbnail' => "podcast.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        // Event::create([
        //     'event_name' => "MALAM TAKBIRAN BERSAMA PPI TURKI",
        //     'slug' => "malam-takbiran-bersama-ppi-turki",
        //     'place' => "Zoom meeting",
        //     'date' => now(),
        //     'thumbnail' => "takbiran.jpeg",
        //     'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        // ]);

        $input = '26/10/2011 19:00';
        $rep_input = str_replace('/', '-', $input); 
        Event::create([
            'event_name' => "Yuk kita sahurrr",
            'slug' => "yuk-kita-sahurrr",
            'place' => "Zoom meeting",
            'date' => date('Y-m-d h:i', strtotime($rep_input)),
            'thumbnail' => "yks.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Status::create([
            'status' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates nisi neque saepe impedit eius iusto ex in ratione consequatur est!",
            'user_id' => 1 
        ]);

        Comment::create([
            'comment' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates nisi neque saepe impedit eius iusto ex in ratione consequatur est!",
            'user_id' => 1,
            'status_id' => 1,
        ]);

        Comment::create([
            'comment' => "Xommentar",
            'user_id' => 1,
            'status_id' => 1,
        ]);

        $nipyear = [
            ['year' => '2018'],
            ['year' => '2019'], 
            ['year' => '2020'], 
            ['year' => '2021'],
            ['year' => '2022']
        ];
        NipCounter::insert($nipyear);


    }
}
