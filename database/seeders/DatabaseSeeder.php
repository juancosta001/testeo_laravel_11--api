<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //llamar en orden para evitar conflictos, cuando ejecutamos el comando seed ahora sera este orden
        // $this->call([
        //     CategorySeeder::class,
        //     PostSeeder::class,
        // ]);

        //para factorizar 30 registros, por eso el 30
        Post::factory(30)->create();
    }
}
