<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'category',
        'description',
        'user',
        'price',
        'image_1',
        'image_2',
    ];
}
