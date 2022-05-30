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
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('sub_subcategory_id')->nullable();
            $table->string('product_name_en');
            $table->string('product_name_lith');
            $table->string('product_slug_en');
            $table->string('product_slug_lith');
            $table->string('product_code')->nullable();
            $table->string('product_model_en')->nullable();
            $table->string('product_model_lith')->nullable();
            $table->string('product_qty');
            $table->string('matirial_type_en');
            $table->string('matirial_type_lith');
            $table->string('product_price');
            $table->string('product_short_dic_en');
            $table->string('product_short_dic_lith');
            $table->text('product_long_dic_en')->nullable();
            $table->text('product_long_dic_lith')->nullable();
            $table->integer('product_status')->default(0);
            $table->string('product_thambnail');
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('diameter_inner')->nullable();
            $table->string('diameter_outer')->nullable();
            $table->string('radius')->nullable();
            $table->string('thickness')->nullable();
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
