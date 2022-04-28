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
            'name' => "muadz izharul",
            'email' => "muadzihharul@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        $user->identity()->create([
            'fakultas_prodi' => 'teknik komputer',
            'gender' => 'laki',
            'passport_no' => 'c4dsdsad',
            'phone_number' => '905525911215',
            'user_id' => $user->id
        ]);

        $user1 = User::create([
            'name' => "should be anon",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'super-admin',
        ]);

        $user1->identity()->create([
            'fakultas_prodi' => 'teknik komputer',
            'gender' => 'laki',
            'passport_no' => 'c4dsdsad',
            'phone_number' => '905525911215',
            'user_id' => $user1->id
        ]);

        $user2 = User::create([
            'name' => "muadz izharul",
            'email' => "muzihharul@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);

        $user2->identity()->create([
            'fakultas_prodi' => 'teknik komputer',
            'gender' => 'laki',
            'passport_no' => 'c4dsdsad',
            'phone_number' => '905525911215',
            'user_id' => $user2->id
        ]);

        Event::create([
            'event_name' => "World water day",
            'event_place' => "Zoom meeting",
            'date' => '04-01-2022 12:00',
            'thumbnail' => "image.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Event::create([
            'event_name' => "Hari tanpa air",
            'event_place' => "Zoom meeting",
            'date' => '04-01-2022 12:00',
            'thumbnail' => "image.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Event::create([
            'event_name' => "World birth day",
            'event_place' => "Zoom meeting",
            'date' => '04-01-2022 12:00',
            'thumbnail' => "image.jpeg",
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
