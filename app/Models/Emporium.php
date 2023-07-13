<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emporium extends Model
{
    use HasFactory;
    
    protected $table = 'emporiums';

    protected $fillable = ['name', 'product_id', 'georeferencing_address_id'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'emporiums_products', 'emporiums_id', 'products_id');
    }    

    public function georeferencingAddress()
    {
        return $this->belongsTo(GeoreferencingAddress::class);
    }
}
