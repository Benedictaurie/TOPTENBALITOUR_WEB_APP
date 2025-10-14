<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'destinations_id',
        'name',
        'description',
        'price',
        'image_url',
        'is_available',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destinations_id');
    }
}
