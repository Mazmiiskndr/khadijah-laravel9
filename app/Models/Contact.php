<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'province_id',
        'city_id',
        'province',
        'city',
        'shop_name',
        'email',
        'address',
        'postal_code',
        'phone',
        'tiktok',
        'instagram',
        'facebook',
        'shopee',
        'tokped',
    ];
}
