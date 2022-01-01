<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();
        Post::create([
          'title'=> 'asimble title',
          'slug'=>Str::slug('asimble title'),
          'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, beatae enim? Blanditiis voluptas deserunt temporibus dolorum sint voluptate ea saepe eum, at laborum aliquid impedit ipsum quo ut ratione corrupti?',
          'image'=>'p1.jpg',
          'user_id'=> 1,
          'category_id'=>1,

        ]);
        Post::create([
            'title'=> 'introduction to js',
            'slug'=>Str::slug('introduction to js'),
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, beatae enim? Blanditiis voluptas deserunt temporibus dolorum sint voluptate ea saepe eum, at laborum aliquid impedit ipsum quo ut ratione corrupti?',
            'image'=>'p2.jpg',
            'user_id'=> 1,
            'category_id'=>2,

          ]);
          Post::create([
            'title'=> 'laravel from strach',
            'slug'=>Str::slug('laravel from strach'),
            'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, beatae enim? Blanditiis voluptas deserunt temporibus dolorum sint voluptate ea saepe eum, at laborum aliquid impedit ipsum quo ut ratione corrupti?',
            'image'=>'p3.jpg',
            'user_id'=> 1,
            'category_id'=>3,

          ]);
    }
}
