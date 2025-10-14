<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'vehicle_type',
        'license_plate',
        'status',
        'last_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
