<?php

namespace Database\Seeders;

use App\Models\Frontend\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create([
            'name'=>'Chattagram'
        ]);

        Division::create([
            'name'=>'Rajshahi'
        ]);

        Division::create([
            'name'=>'Khulna'
        ]);

        Division::create([
            'name'=>'Barisal'
        ]);

        Division::create([
            'name'=>'Sylhet'
        ]);

        Division::create([
            'name'=>'Dhaka'
        ]);

        Division::create([
            'name'=>'Rangpur'
        ]);

        Division::create([
            'name'=>'Mymensingh'
        ]);
    }
}
