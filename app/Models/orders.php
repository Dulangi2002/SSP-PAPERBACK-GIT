<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'the_carts_id',
        'status',
        'total_price',
        'ContactNumber',
        'houseNumber',
        'streetAddress',
        'city',
       
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theCart()
    {
        return $this->belongsTo(TheCart::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
        ->withPivot('quantity','product_price','total_price_per_product');
    }

    public function orders_product()
    {
        return $this->hasMany(orders_product::class);
    }



}
