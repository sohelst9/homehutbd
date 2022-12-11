<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'admin_id'=> '1',
            'name'=> 'Men Fashion',
            'banner'=> '638b849913df2categories.jpg',
            'meta_title'=> 'Men Fashion',
            'meta_descp'=> 'Men Fashion',
        ]);

        Category::create([
            'admin_id'=> '1',
            'name'=> 'Women Fashion',
            'banner'=> '638b84a64b9a6categories.jpg',
            'meta_title'=> 'Women Fashion',
            'meta_descp'=> 'Women Fashion',
        ]);

        Category::create([
            'admin_id'=> '1',
            'name'=> 'Mobile Phone',
            'banner'=> '23.png',
            'meta_title'=> 'Mobile Phone',
            'meta_descp'=> 'Mobile Phone',
        ]);

        Category::create([
            'admin_id'=> '1',
            'name'=> 'Laptop',
            'banner'=> '12.png',
            'meta_title'=> 'laptop',
            'meta_descp'=> 'laptop',
        ]);

        Category::create([
            'admin_id'=> '1',
            'name'=> 'Watchs',
            'banner'=> '07.png',
            'meta_title'=> 'Watchs',
            'meta_descp'=> 'Watchs',
        ]);
    }
}
