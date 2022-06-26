<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Event;
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
        $user = User::create([
            'name' => "Admin web",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        $user->identity()->create([
            'faculty' => 'teknik komputer',
            'gender' => 'laki',
            'university' => 'Bandirma onyedi eylul',
            'married' => 'sudah',
            'student_no' => '201502208',
            'date_of_birth' => '20/20/1999',
            'phone_number' => '905525911215',
            'user_id' => $user->id,
        ]);

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
            'gender' => 'laki',
            'phone_number' => '905525911215',
            'user_id' => $user1->id,
            'date_of_birth' => '20/20/1999',
            'university' => 'Bandirma onyedi eylul',
            'married' => 'belum',
            'student_no' => '201502209',
        ]);

        $user2 = User::create([
            'name' => "warga biasa",
            'email' => "user@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);

        $user2->identity()->create([
            'faculty' => 'teknik komputer',
            'gender' => 'laki',
            'phone_number' => '905525911215',
            'user_id' => $user2->id,
            'date_of_birth' => '20/20/1999',
            'university' => 'Bandirma onyedi eylul',
            'married' => 'sudah',
            'student_no' => '201502210',
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


    }
}
