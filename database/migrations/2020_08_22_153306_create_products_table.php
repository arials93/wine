<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('barcode')->unique()->nullable();
            $table->float('abv')->nullable();
            $table->year('vintage')->nullable();
            $table->text('image');
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('sale')->default(0);
            $table->text('description')->nullable();
            $table->unsignedInteger('instock')->default(0);
            $table->boolean('bestseller')->default(false);
            //Foreign Key
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');

            $table->unsignedInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->softDeletes();
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
}
