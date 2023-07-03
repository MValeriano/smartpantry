<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Larder extends Model
{
    use HasFactory;
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'larder_product')
            ->withPivot('quantity', 'expiration_date');
    }
 
}
