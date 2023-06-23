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
            $table->string('order_number', 100);
            $table->dateTime('order_date');
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('shipping_date')->nullable();
            $table->enum('order_status', [
                'Menunggu Pembayaran',
                'Sedang Diverifikasi',
                'Pembayaran Berhasil',
                'Pesanan Diproses',
                'Pesanan Dikirim',
                'Pesanan Diterima',
                'Pesanan Selesai',
                'Pesanan Dibatalkan',
                'Pengembalian Dana'
            ]);
            $table->string('order_type', 100);
            $table->integer('total_price');
            $table->string('receiver_name', 200);
            $table->text('shipping_address');
            $table->string('shipping_city', 50);
            $table->string('shipping_province', 50);
            $table->string('shipping_postal_code', 10);
            $table->string('receiver_phone', 20);
            $table->string('provider', 100)->nullable();
            $table->string('rekening_name')->nullable();
            $table->string('rekening_number')->nullable();
            $table->string('payment_proof')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('order');
    }
};
