<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code',
        'user_id',
        'booking_type',
        'tour_packages_id',
        'activity_packages_id',
        'rental_packages_id',
        'start_date',
        'end_date',
        'num_persons',
        'status',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class, 'tour_packages_id');
    }

    public function activityPackage()
    {
        return $this->belongsTo(ActivityPackage::class, 'activity_packages_id');
    }

    public function rentalPackage()
    {
        return $this->belongsTo(RentalPackage::class, 'rental_packages_id');
    }
}
