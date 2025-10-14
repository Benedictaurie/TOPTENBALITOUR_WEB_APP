<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'destination_id',
        'name',
        'description',
        'price',
        'duration_days',
        'image_url',
        'is_available',
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
