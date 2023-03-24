<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'subscribers';
    protected $primaryKey = 'subscriber_id';
    protected $fillable = ['email_subscriber'];
    public $timestamps = true;
    use HasFactory;
}
