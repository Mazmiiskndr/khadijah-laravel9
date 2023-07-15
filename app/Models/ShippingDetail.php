<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'shipping_id';

    protected $table = 'shipping_details';

    protected $fillable = [
        'shipping_uid',
        'order_id',
        'tracking_number',
        'expedition',
        'parcel',
        'delivery_cost',
        'weight'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->shipping_uid = str()->uuid();
        });
    }

    // ShippingDetail belongs to Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
