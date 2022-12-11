<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name'=>'NA',
            'code'=>'FF0000',
        ]);

        Color::create([
            'name'=>'Red',
            'code'=>'FF0000',
        ]);

        Color::create([
            'name'=>'Orange',
            'code'=>'FFA500',
        ]);

        Color::create([
            'name'=>'Yello',
            'code'=>'FFFF00',
        ]);

        Color::create([
            'name'=>'Green',
            'code'=>'008000',
        ]);

        Color::create([
            'name'=>'Blue',
            'code'=>'0000FF',
        ]);
    }
}
