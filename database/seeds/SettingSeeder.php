<?php

use Illuminate\Database\Seeder;
use App\Setting;
use Illuminate\Support\Facades\DB;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        Setting::create([
            'site_name'=>'Noura mohamed',
            'contact_email'=>'noura@gmail.com',
            'address'=>'cairo',
        ]);

    }
}
