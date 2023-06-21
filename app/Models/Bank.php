<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'bank';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'bank_uid',
        'provider',
        'rekening_name',
        'rekening_number',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->bank_uid = str()->uuid();
        });
    }
}
