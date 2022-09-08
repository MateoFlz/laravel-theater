<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'position_x',
        'position_y'
    ];

    public function booking()
    {
        return $this->belongsToMany(

            Booking::class,
            'bookings_seats',
            'seat_id',
            'booking_id'
        );
    }
}
