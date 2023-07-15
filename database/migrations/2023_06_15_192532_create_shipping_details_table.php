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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id('shipping_id');
            $table->uuid('shipping_uid')->unique(); // Added uid column
            $table->unsignedBigInteger('order_id');
            $table->string('tracking_number')->nullable();
            $table->string('expedition');
            $table->string('parcel');
            $table->integer('delivery_cost');
            $table->double('weight', 8, 2);
            $table->timestamps();

            $table->foreign('order_id')
            ->references('order_id')
            ->on('order')
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
        Schema::dropIfExists('shipping_details');
    }
};
