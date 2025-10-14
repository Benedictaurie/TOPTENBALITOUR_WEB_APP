<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itinerary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tour_packages_id',
        'day_number',
        'time',
        'daily_activity',
        'destination_id',
        'description',
    ];

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class, 'tour_packages_id');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
