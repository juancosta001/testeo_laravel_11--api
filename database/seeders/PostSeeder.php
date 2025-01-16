<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();
         //si no es de cascada se usa esto, para evitar problemas, solo funciona si se esta usando mysql, ya que en sqlite no funciona de esa manera
         if (DB::getDriverName() === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

      
        //despues de borrar, se vuelve a activar la restriccion
        if (DB::getDriverName() === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }

        $title = Str::random(20);


        for ($i = 1; $i < 20; $i++) {
            $title = str()->random(20);
            $c = category::inRandomOrder()->first();
            Post::create([
        "title"=> $title,
        "slug"=> Str::slug($title),
        "description" => "Descripcion de prueba nro $i",
        "content"=> "Contenido de prueba nro $i",
        "image"=> "Imagen de prueba nro $i",
        "posted"=> "yes",
        "category_id"=> $c->id,
      ]);
      }
    }
}
