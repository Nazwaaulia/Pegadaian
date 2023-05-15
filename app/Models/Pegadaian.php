<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegadaian extends Model
{
    use HasFactory;
    protected $table="pegadaians";
    protected $fillable = [
        'nik',
        'name',
        'age',
        'email',
        'phone',
        'item',
        'image',
        'status',
        'shop_location'
    ];
}
