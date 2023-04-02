<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'cart_uid', 'product_id', 'customer_id',  'color',  'size', 'quantity'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->cart_uid = str()->uuid();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
