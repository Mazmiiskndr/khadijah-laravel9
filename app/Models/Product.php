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

    // TODO: DETAIL PRODUCTS
    // public function detailProducts()
    // {
    //     return $this->hasMany(DetailProduct::class, 'product_id', 'product_id');
    // }

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
}
