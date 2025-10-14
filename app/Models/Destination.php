<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'location',
        'image_url',
    ];

    public function tourPackages()
    {
        return $this->hasMany(TourPackage::class);
    }

    public function activityPackages()
    {
        return $this->hasMany(ActivityPackage::class, 'destinations_id');
    }
}
