<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB; 
class Categoriestableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
'name'=>'catergory 1',
'slug'=>str::slug('category 1'),
 'description'=>'category description text',

       ]);
    }
}



