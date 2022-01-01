<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Illuminate\Support\Facades\DB;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        Comment::create([
            'body'=>' some coment here',
            'user_id'=>1,
            'post_id'=>1,
        ]);
        Comment::create([
            'body'=>' some coment here',
            'user_id'=>1,
            'post_id'=>2,
        ]);
        Comment::create([
            'body'=>' some coment here',
            'user_id'=>1,
            'post_id'=>3,
        ]);
    }
}
