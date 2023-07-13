<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmporiumProduct extends Model
{
    use HasFactory;

    public function emporiums()
    {
        return $this->belongsToMany(Emporium::class, 'emporiums_products', 'products_id', 'emporiums_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'emporiums_products', 'emporiums_id', 'products_id');
    }    
}
