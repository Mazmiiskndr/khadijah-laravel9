<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $fillable = [
        'image_name',
        'product_id', // tambahkan field product_id ke fillable
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

}
