<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    use HasFactory;
    protected $table = 'colors';

    protected $fillable = [
        'color_id',
        'color_name',
    ];
    public $timestamps = false;
    protected $primaryKey = 'color_id';
}
