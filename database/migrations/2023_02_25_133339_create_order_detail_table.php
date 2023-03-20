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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->uuid('order_detail_uid')->unique(); // Added uid column
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('order');
            $table->foreign('product_id')->references('product_id')->on('product');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
};
