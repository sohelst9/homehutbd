<?php

namespace Database\Seeders;

use App\Models\Frontend\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'division_id'=>'1',
            'name'=>'Comilla',
        ]);

        District::create([
            'division_id'=>'1',
            'name'=>'Feni',
        ]);

        District::create([
            'division_id'=>'1',
            'name'=>'Brahmanbaria',
        ]);

        District::create([
            'division_id'=>'1',
            'name'=>'Rangamati',
        ]);

        District::create([
            'division_id'=>'2',
            'name'=>'Sirajganj',
        ]);

        District::create([
            'division_id'=>'2',
            'name'=>'Pabna',
        ]);

        District::create([
            'division_id'=>'2',
            'name'=>'Bogura',
        ]);

        District::create([
            'division_id'=>'2',
            'name'=>'Rajshahi',
        ]);

        District::create([
            'division_id'=>'3',
            'name'=>'Jashore',
        ]);

        District::create([
            'division_id'=>'3',
            'name'=>'Satkhira',
        ]);

        District::create([
            'division_id'=>'3',
            'name'=>'Khulna',
        ]);

        District::create([
            'division_id'=>'4',
            'name'=>'Patuakhali',
        ]);

        District::create([
            'division_id'=>'4',
            'name'=>'Barisal',
        ]);

        District::create([
            'division_id'=>'4',
            'name'=>'Pirojpur',
        ]);
        
    }
}
