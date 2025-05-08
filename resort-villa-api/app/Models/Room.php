<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['villa_id', 'room_number', 'type', 'price', 'is_available'];

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
