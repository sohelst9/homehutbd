<?php

namespace Database\Seeders;

use App\Models\Copyright;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CopyrightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Copyright::create([
            'copyright'=>'Homehutbd @ 2022'
        ]);
    }
}
