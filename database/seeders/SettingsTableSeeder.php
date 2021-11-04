<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([
            'title'=>'E-mart online shopping',
            'meta_description'=>'This is my second project using javascript with ajax',
            'meta_keywords'=>'E-mart,online shopping site,My second project',
            'logo'=>'frontend/img/core-img/logo.png',
            'favicon'=>'',
            'address'=>'Khilkhet,Dhaka',
            'email'=>'iftekherpial67@gmail.com',
            'phone'=>'01682824509',
            'fax' =>'01682824509',
            'footer' =>'Iftekher Pial',
            'facebook_url'=>'https://www.facebook.com/ipial7425/',
            'twitter_url'=>'',
            'linkedin_url'=>'',
        ]);
    }
}
