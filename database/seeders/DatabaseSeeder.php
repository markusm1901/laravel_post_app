<?php

namespace Database\Seeders;
use app\Models\Publication;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Comment;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::create([
        //     'name' => 'Yasuo Rioter',
        //     'email' => 'yasuo@riotgames.com',
        //     'password' => bcrypt('mojehaslo123')
        // ]);
        $this->call([
            UserSeeder::class,
            PublicationSeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
    ]);
    }
    
}