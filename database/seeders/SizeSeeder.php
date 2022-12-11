<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void'name'=>'L',
            
     */
    public function run()
    {
        Size::create([
            'name'=>'NA'
        ]);

        Size::create([
            'name'=>'M'
        ]);

        Size::create([
            'name'=>'L'
        ]);

        Size::create([
            'name'=>'X'
        ]);

        Size::create([
            'name'=>'XL'
        ]);

        Size::create([
            'name'=>'8GB'
        ]);

        Size::create([
            'name'=>'4GB'
        ]);
    }
}
