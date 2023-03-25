<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningCustomer extends Model
{
    use HasFactory;

    protected $table = 'rekening_customers';
    protected $primaryKey = 'rekening_customer_id';
    protected $fillable = [
        'customer_id',
        'rekening_customer_uid',
        'provider',
        'rekening_name',
        'rekening_number',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->rekening_customer_uid = str()->uuid();
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
