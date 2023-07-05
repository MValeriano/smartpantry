<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LarderProduct extends Model
{
    use HasFactory;

    protected $table = 'larders_products';

    protected $fillable = [
        'larder_id',
        'product_id',
        'quantity',
        'expiration_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'larders_products', 'product_id', 'larder_id');
    }

    public function larder()
    {
        return $this->belongsTo(Larder::class,'larders_products', 'larder_id', 'product_id');
    }     
}
