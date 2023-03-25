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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->uuid('customer_uid')->unique(); // Added uid column
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender',100)->nullable();
            $table->timestamp('registration_date');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('customer', function (Blueprint $table) {
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces')
                    ->onDelete('set null');

            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onDelete('set null');

            $table->foreign('district_id')
                    ->references('id')
                    ->on('districts')
                    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
