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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('contact_id');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            // $table->unsignedBigInteger('district_id')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('shopee')->nullable();
            $table->string('tokped')->nullable();
            // *** TODO: ***
            // $table->string('bukalapak')->nullable();
            // $table->string('lazada')->nullable();
            // $table->string('blibli')->nullable();
            $table->timestamps();

            // $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
