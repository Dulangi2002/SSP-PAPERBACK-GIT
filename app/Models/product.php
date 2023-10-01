<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'author',
        'description',
        'price',
        'category',
        'image',  
        'stock',
        'stock_status'

    ];
}
