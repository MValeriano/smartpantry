<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_street',
        'address_number',
        'address_district',
        'address_city',
        'address_state',
        'address_zipcode',
    ];
}
