<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_uid',
        'category_id',
        'product_name',
        'product_slug',
        'product_description',
        'dimension',
        'price',
        'discount',
        'color',
        'stock',
        'size',
        'material',
        'type',
        'thumbnail',
        'weight',
        'date_added',
        'date_updated',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->product_uid = str()->uuid();
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'product_id');
    }

    // QUERY BEST SELLING PRODUCTS

    // $bestSellingProducts = Product::select('product.*')
    // ->withCount(['orderDetails as total_sold' => function ($query) {
    //     $query->join('order', 'order_detail.order_id', '=', 'order.order_id')
    //         ->where('order.order_status', 'Pesanan Selesai'); // atau status yang sesuai untuk pesanan yang berhasil
    // }])
    // ->join('order_detail', 'product.product_id', '=', 'order_detail.product_id')
    // ->groupBy('product.product_id')
    // ->orderBy('total_sold', 'desc')
    // ->take(10) // Jumlah produk terlaris yang ingin diambil (misalnya, 10 produk terlaris)
    // ->get();
}
