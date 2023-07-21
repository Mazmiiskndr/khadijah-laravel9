<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPromo extends Model
{
    use HasFactory;

    protected $table = 'order_promo';
    // protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id',
        'promo_id',
    ];

    public $timestamps = false;

    /**
     * Get the promo associated with the model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

    /**
     * Get the order that this item belongs to.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
