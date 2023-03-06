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
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_name', 200);
            $table->string('product_slug', 200); // Added product_slug column
            $table->text('product_description');
            $table->string('dimension', 150); // Added material column
            $table->string('material', 150); // Added material column
            $table->string('size', 50); // Added size column
            $table->string('type', 100); // Added type column
            $table->integer('price');
            $table->string('thumbnail', 200);
            $table->string('color', 50);
            $table->decimal('weight', 10, 2);
            $table->integer('stock');
            $table->dateTime('date_added');
            $table->dateTime('date_updated')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
