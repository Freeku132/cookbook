<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Post;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Order::factory(500)->create();
        Post::factory(10)->create();

        Song::create([
            'title' => 'Thriller',
            'author' => 'Michael Jackson',
            'year' => 1982,
            'order' => 2,
        ]);

        Song::create([
            'title' => 'Hey Jude',
            'author' => 'The Beatles',
            'year' => 1968,
            'order' => 3,
        ]);

        Song::create([
            'title' => 'Bohemian Rhapsody',
            'author' => 'Queen',
            'year' => 1975,
            'order' => 1,
        ]);

        Song::create([
            'title' => 'Never Gonna Give You Up',
            'author' => 'Rick Astley',
            'year' => 1987,
            'order' => 6,
        ]);

        Song::create([
            'title' => 'Always Be My Baby',
            'author' => 'Mariah Carey',
            'year' => 1995,
            'order' => 5,
        ]);

        Song::create([
            'title' => 'Lose Yourself',
            'author' => 'Eminem',
            'year' => 2002,
            'order' => 4,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
