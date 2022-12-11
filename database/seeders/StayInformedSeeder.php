<?php

namespace Database\Seeders;

use App\Models\StayInformed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StayInformedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StayInformed::create([
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
