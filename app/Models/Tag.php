<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $primaryKey = 'tag_id';
    protected $fillable = [
        'tag_name',
        'tag_description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->tag_uid = str()->uuid();
        });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags', 'tag_id', 'product_id');
    }
}
