<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //si no es de cascada se usa esto, para evitar problemas, solo funciona si se esta usando mysql, ya que en sqlite no funciona de esa manera
        if (DB::getDriverName() === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        Category::truncate();
        //despues de borrar, se vuelve a activar la restriccion
        if (DB::getDriverName() === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }

        for ($i = 0; $i < 20; $i++) {
      Category::create([
        "title"=> "Categoria $i",
        "slug"=> "categoria-$i",
      ]);
      }
      
    }
}
