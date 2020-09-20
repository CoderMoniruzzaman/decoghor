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
            $table->id();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('product_sales');
            $table->integer('product_alert');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id');
            $table->integer('tax_id');
            $table->integer('product_unit');
            $table->integer('unit_id');
            $table->string('product_image')->default('defaultproductphoto.jpg');
            //$table->string('product_mulimg')->default('defaultmulphoto.jpg');
            $table->json('product_mulimg')->default(json_encode(["defaultmulphoto.jpg"]));
            $table->longText('product_description');
            $table->boolean('product_status')->default(0);
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
