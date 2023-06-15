<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $table = 'order';

    protected $fillable = [
        'shipping_uid',
        'order_id',
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
}
