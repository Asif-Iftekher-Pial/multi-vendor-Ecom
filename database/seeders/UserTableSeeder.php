<?php

namespace Database\Seeders;

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
        User::create([
            'full_name'=>'Asif iftekher pial',
            'username'=>'Iftekher pial',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
            'status'=>'active',
            'phone'=>'01682824509',
            'role'=>'admin'
        ]);
    }
}
