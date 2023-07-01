<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoreferencingAddress extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'x_coordinate',
        'y_coordinate',
        'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
