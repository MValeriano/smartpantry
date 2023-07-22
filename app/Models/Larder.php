<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Larder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'larders_products', 'larder_id', 'product_id')
            ->withPivot('quantity', 'expiration_date');
    }
 
}
