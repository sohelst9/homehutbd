<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        admin::create([
            'username'=>'admin',
            'phone'=>'01775485696',
            'email'=>'admin@gmail.com',
            'profile_image'=>'1.jpg',
            'password'=>Hash::make('123456'),
        ]);

        admin::create([
            'username'=>'homehutbd',
            'phone'=>'01775485694',
            'email'=>'homehutbd@gmail.com',
            'profile_image'=>'2.jpg',
            'password'=>Hash::make('123456'),
        ]);
    }
}
