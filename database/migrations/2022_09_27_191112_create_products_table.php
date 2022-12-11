<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('added_by');
            $table->string('productName');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id')->nullable();
            $table->string('weight')->nullable();
            $table->string('barcode')->nullable();
            $table->string('thumbnailImage');
            $table->integer('productPrice');
            $table->integer('discount')->nullable();
            $table->integer('after_discount')->nullable();
            $table->string('discountDate')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('description');
            $table->string('meta_title')->nullable();
            $table->text('meta_descp')->nullable();
            $table->string('featured')->nullable();
            $table->string('to_day_deal')->nullable();
            $table->string('addToFlash')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
