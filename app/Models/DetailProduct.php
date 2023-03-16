<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    use HasFactory;

    protected $table = 'detail_products';
    protected $primaryKey = 'detail_product_id';
    protected $fillable = [
        'product_id',
        'price',
        'discount',
        'color',
        'stock',
        'size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }


}
