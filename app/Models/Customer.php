<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'email',
        'password',
        'province_id',
        'city_id',
        'district_id',
        'province',
        'city',
        'district',
        'address',
        'postal_code',
        'phone',
        'registration_date',
    ];
    protected $primaryKey = 'id';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->customer_uid = str()->uuid();
        });
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'customer_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function rekening_customers()
    {
        return $this->hasMany(RekeningCustomer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
