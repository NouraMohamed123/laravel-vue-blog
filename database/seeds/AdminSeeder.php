<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();
        User::create([
            'name'=>'Ahmed mohamed',
            'email'=>'Ahmed@gmail.com',
            'password'=>bcrypt('12345678'),
            'profile_img'=>'profile_img1.jpg',
            'is_admin'=> true
        ]);
    }
}
