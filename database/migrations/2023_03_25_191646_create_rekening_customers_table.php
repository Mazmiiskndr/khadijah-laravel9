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
        Schema::create('rekening_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->uuid('rekening_customer_uid')->unique(); // Added uid column
            $table->string('provider');
            $table->string('rekening_name');
            $table->string('rekening_number');
            $table->timestamps();

            $table->foreign('customer_id')
                    ->references('id')
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
        Schema::dropIfExists('rekening_customers');
    }
};
