<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Category::create([
             'name'=>'html tutorials',
             'slug'=>'html-tutorials',
        ]);
        Category::create([
            'name'=>'css tutorials',
            'slug'=>'css-tutorials',
       ]);
       Category::create([
        'name'=>'javascript tutorials',
        'slug'=>'javascript-tutorials',
   ]);
    Category::create([
        'name'=>'laravel tutorials',
        'slug'=>'laravel-tutorials',
    ]);
    Category::create([
        'name'=>'vue-js tutorials',
        'slug'=>'vue-js tutorials',
   ]);
    }
}
