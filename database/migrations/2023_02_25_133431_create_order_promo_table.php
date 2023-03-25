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
        Schema::create('order_promo', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('promo_id');
            $table->primary(['order_id', 'promo_id']);




            $table->foreign('order_id')
                    ->references('order_id')
                    ->on('order')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('promo_id')
                    ->references('promo_id')
                    ->on('promo')
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
        Schema::dropIfExists('order_promo');
    }
};
