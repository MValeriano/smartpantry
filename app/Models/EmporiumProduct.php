<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmporiumProduct extends Model
{
    use HasFactory;

    public function emporiums()
    {
        return $this->belongsToMany(Emporium::class, 'emporiums_products', 'product_id', 'emporium_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'emporiums_products', 'emporium_id', 'product_id');
    }    
}
