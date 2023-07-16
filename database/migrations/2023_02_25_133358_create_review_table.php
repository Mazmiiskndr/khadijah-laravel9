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
        Schema::create('review', function (Blueprint $table) {
            $table->id('review_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('subject',200);
            $table->text('comment');
            $table->integer('rating');
            $table->dateTime('review_date');
            $table->timestamps();

            $table->foreign('product_id')
                    ->references('product_id')
                    ->on('product')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('customer_id')
                    ->references('customer_id')
                    ->on('customer')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
};
