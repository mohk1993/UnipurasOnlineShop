<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_name_en');
            $table->string('slider_name_lith');
            $table->string('slider_slug_en');
            $table->string('slider_slug_lith');
            $table->string('slider_image');
            $table->integer('slider_status')->default(1);
            $table->text('slider_description_en')->nullable();
            $table->text('slider_description_lith')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
