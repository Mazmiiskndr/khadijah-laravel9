<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'customer';
    protected $table = 'customer';

    protected $fillable = [
        'name',
        'email',
        'password',
        'province',
        'city',
        'district',
        'address',
        'postal_code',
        'phone',
        'registration_date',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
