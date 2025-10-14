<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentalPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'brand',
        'model',
        'plate_number',
        'description',
        'image_url',
        'price_per_day',
        'is_available',
    ];
}
