<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Opinion;
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
        User::create([
            'name' => "muadz izharul",
            'email' => "muadzihharul@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Event::create([
            'event_name' => "World water day",
            'event_place' => "Zoom meeting",
            'date' => '04/01/2022 12:00 AM - 04/01/2022 11:59 PM',
            'thumbnail' => "image.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Event::create([
            'event_name' => "Hari tanpa air",
            'event_place' => "Zoom meeting",
            'date' => '04/01/2022 12:00 AM - 04/01/2022 11:59 PM',
            'thumbnail' => "image.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Event::create([
            'event_name' => "World birth day",
            'event_place' => "Zoom meeting",
            'date' => '04/01/2022 12:00 AM - 04/01/2022 11:59 PM',
            'thumbnail' => "image.jpeg",
            'description' => "Masukan <em>deskripsi</em> <u>acara</u> <strong>disini</strong>"
        ]);

        Opinion::create([
            'opini' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates nisi neque saepe impedit eius iusto ex in ratione consequatur est!",
            'user_id' => 1 
        ]);

    }
}
