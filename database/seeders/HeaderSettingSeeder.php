<?php

namespace Database\Seeders;

use App\Models\HeaderSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HeaderSetting::create([
            'site_icon'=>'03.png',
            'site_logo'=>'03.png',
            'help_number'=>'01725869586',
        ]);
    }
}
