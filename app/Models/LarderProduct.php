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

}
