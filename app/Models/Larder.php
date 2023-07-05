<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Larder extends Model
{
    use HasFactory;
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'larders_products')
            ->withPivot('quantity', 'expiration_date');
        // return $this->belongsToMany(Product::class, 'larders_products', 'larder_id', 'product_id');
    }
 
}
