<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function tripsFrom()
    {
        return $this->hasMany(Trip::class, 'from_location_id', 'id');
    }

    public function tripsTo()
    {
        return $this->hasMany(Trip::class, 'to_location_id', 'id');
    }
}
