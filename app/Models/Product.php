<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_weight',
        'measurement_units',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function emporiums()
    {
        return $this->belongsToMany(Emporium::class, 'emporiums_products', 'product_id', 'emporium_id');
    }

}
