<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'added_by'=>'1',
            'category'=>'1',
            'subcategory'=>'Men T-Shart',
            'banner'=>'01.png',
            'meta_title'=>'Men T-Shart',
            'meta_descp'=>'Men T-Shart',
        ]);

        Subcategory::create([
            'added_by'=>'1',
            'category'=>'1',
            'subcategory'=>'Men Shart',
            'banner'=>'02.png',
            'meta_title'=>'Men Shart',
            'meta_descp'=>'Men Shart',
        ]);

        Subcategory::create([
            'added_by'=>'1',
            'category'=>'1',
            'subcategory'=>'Men Pant',
            'banner'=>'03.png',
            'meta_title'=>'Men Pant',
            'meta_descp'=>'Men Pant',
        ]);

        Subcategory::create([
            'added_by'=>'1',
            'category'=>'2',
            'subcategory'=>'Women Shoe',
            'banner'=>'17.png',
            'meta_title'=>'Women Shoe',
            'meta_descp'=>'Women Shoe',
        ]);

        Subcategory::create([
            'added_by'=>'1',
            'category'=>'3',
            'subcategory'=>'Smart Phone',
            'banner'=>'23.png',
            'meta_title'=>'Smart Phone',
            'meta_descp'=>'Smart Phone',
        ]);

        Subcategory::create([
            'added_by'=>'1',
            'category'=>'4',
            'subcategory'=>'Laptop',
            'banner'=>'12.png',
            'meta_title'=>'Laptop',
            'meta_descp'=>'Laptop',
        ]);

        Subcategory::create([
            'added_by'=>'1',
            'category'=>'5',
            'subcategory'=>'Men Watch',
            'banner'=>'07.png',
            'meta_title'=>'Men Watch',
            'meta_descp'=>'Men Watch',
        ]);
    }
}
