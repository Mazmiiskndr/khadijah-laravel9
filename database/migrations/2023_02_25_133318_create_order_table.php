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
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->uuid('order_uid')->unique(); // Added uid column
            $table->unsignedBigInteger('customer_id');
            $table->dateTime('order_date');
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('shipping_date')->nullable();
            $table->string('order_status', 50);
            $table->integer('total_price');
            $table->string('receiver_name', 200);
            $table->text('shipping_address');
            $table->string('shipping_city', 50);
            $table->string('shipping_province', 50);
            $table->string('shipping_postal_code', 10);
            $table->string('receiver_phone', 20);
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
