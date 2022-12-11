<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'admin_id'=>'1',
            'title'=>'Men Fashion ',
            'subtitle'=>'Mens Tsharts',
            'discount'=>'10',
            'banner'=>'01.jpg',
            'status'=>'1',
        ]);

        Banner::create([
            'admin_id'=>'1',
            'title'=>'Men Fashion ',
            'subtitle'=>'Mens Stylist Shirt ',
            'discount'=>'15',
            'banner'=>'02.jpg',
            'status'=>'1',
        ]);
    }
}
