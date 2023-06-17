<?php

namespace App\Enums;

class OrderStatus
{
    const PENDING_PAYMENT = 'Menunggu Pembayaran';
    const PAYMENT_VERIFICATION = 'Pembayaran Sedang Diverifikasi';
    const PAYMENT_SUCCESS = 'Pembayaran Berhasil';
    const ORDER_PROCESSING = 'Pesanan Diproses';
    const ORDER_SENT = 'Pesanan Dikirim';
    const ORDER_RECEIVED = 'Pesanan Diterima';
    const ORDER_COMPLETED = 'Pesanan Selesai';
    const ORDER_CANCELED = 'Pesanan Dibatalkan';
    const REFUND = 'Pengembalian Dana';
}
