<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $table = 'order';

    protected $fillable = [
        'order_uid',
        'customer_id',
        'order_number',
        'order_date',
        'payment_date',
        'shipping_date',
        'order_status',
        'order_type',
        'total_price',
        'receiver_name',
        'shipping_address',
        'shipping_city',
        'shipping_province',
        'shipping_postal_code',
        'receiver_phone'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->order_uid = str()->uuid();
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // One Order has many OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }

    // One Order has one ShippingDetail
    public function shippingDetail()
    {
        return $this->hasOne(ShippingDetail::class, 'order_id', 'order_id');
    }

}
