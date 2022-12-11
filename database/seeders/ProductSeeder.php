<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductVariation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'added_by'=>'1',
            'productName'=>'Mens Smart T-shart',
            'category_id'=>'1',
            'subcategory_id'=>'1',
            'barcode'=>uniqid(),
            'thumbnailImage'=>'01.png',
            'productPrice'=>'300',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'03.png',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'04.png',
        ]);

        //product 1 variation
        ProductVariation::create([
            'product_id'=>$product->id,
            'color_id'=>'2',
            'size_id'=>'2',
            'quantity'=>'100',
        ]);


        //product 2
        $product = Product::create([
            'added_by'=>'1',
            'productName'=>'Mens Smart Shart',
            'category_id'=>'1',
            'subcategory_id'=>'2',
            'barcode'=>uniqid(),
            'thumbnailImage'=>'02.png',
            'productPrice'=>'500',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'02.png',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'01.png',
        ]);

        //product 2 variation
        ProductVariation::create([
            'product_id'=>$product->id,
            'color_id'=>'2',
            'size_id'=>'2',
            'quantity'=>'100',
        ]);

        ProductVariation::create([
            'product_id'=>$product->id,
            'color_id'=>'2',
            'size_id'=>'3',
            'quantity'=>'10',
        ]);

        //product 3
        $product = Product::create([
            'added_by'=>'1',
            'productName'=>'Mens Smart Men Pant',
            'category_id'=>'1',
            'subcategory_id'=>'3',
            'barcode'=>uniqid(),
            'thumbnailImage'=>'03.png',
            'productPrice'=>'500',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'05.png',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'06.png',
        ]);

        //product 3 variation
        ProductVariation::create([
            'product_id'=>$product->id,
            'color_id'=>'2',
            'size_id'=>'2',
            'quantity'=>'40',
        ]);
        

        //product 4
        $product = Product::create([
            'added_by'=>'1',
            'productName'=>'Womens Fashions Shoes',
            'category_id'=>'2',
            'subcategory_id'=>'4',
            'barcode'=>uniqid(),
            'thumbnailImage'=>'04.png',
            'productPrice'=>'500',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'07.png',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'08.png',
        ]);

        //product 4 variation
        ProductVariation::create([
            'product_id'=>$product->id,
            'color_id'=>'2',
            'size_id'=>'2',
            'quantity'=>'100',
        ]);

        //product 5
        $product = Product::create([
            'added_by'=>'1',
            'productName'=>'Sumsung 4gb smart Phone ',
            'category_id'=>'3',
            'subcategory_id'=>'5',
            'barcode'=>uniqid(),
            'thumbnailImage'=>'04.png',
            'productPrice'=>'15000',
            'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'09.png',
        ]);

        ProductGallery::create([
            'product_id'=>$product->id,
            'gallery'=>'10.png',
        ]);

        //product 5 variation
        ProductVariation::create([
            'product_id'=>$product->id,
            'color_id'=>'4',
            'size_id'=>'7',
            'quantity'=>'40',
        ]);
    }
}
