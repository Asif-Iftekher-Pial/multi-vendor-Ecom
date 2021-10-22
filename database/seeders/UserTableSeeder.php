<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'full_name'=>'Asif iftekher pial',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            'status'=>'inactive',
            'phone'=>'01682824509',
            
        ]);
    }
}
