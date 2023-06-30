<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupermarketList extends Model
{
    protected $fillable = ['list_name', 'supermarket_list_price_total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'supermarket_lists_products')
            ->withPivot('product_quantity', 'purchased', 'supermarket_list_products_price')
            ->withTimestamps();
    }
}
