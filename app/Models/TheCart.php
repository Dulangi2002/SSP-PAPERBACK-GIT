<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TheCart extends Model
{
    use HasFactory;

    protected $fillable = [

        'email',
        'status',
        'total_price',

        
    ];

 
  
    public function user(): BelongsTo
    {
        return $this-> belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
        ->withPivot('quantity','product_price','total_price_per_product');
       
    }

    
}
