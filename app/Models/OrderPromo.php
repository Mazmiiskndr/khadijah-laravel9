<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPromo extends Model
{
    use HasFactory;

    protected $table = 'order_promo';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id',
        'promo_id',
    ];

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }
}
