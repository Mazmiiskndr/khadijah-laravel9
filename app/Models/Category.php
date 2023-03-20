<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'category_id',
        'category_name',
        'category_description',
    ];

    protected $primaryKey = 'category_id';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->category_uid = str()->uuid();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
