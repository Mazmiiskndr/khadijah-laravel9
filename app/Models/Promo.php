<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';
    protected $primaryKey = 'promo_id';
    protected $fillable = [
        'promo_id',
        'promo_code',
        'promo_description',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
    ];

    public function orderPromo()
    {
        return $this->hasMany(OrderPromo::class, 'promo_id', 'promo_id');
    }
}
