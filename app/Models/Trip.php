<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function startLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id', 'id');
    }

    public function endLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id', 'id');
    }

    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
