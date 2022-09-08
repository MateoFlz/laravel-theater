<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'partner_id',
        'date',
        'state'
    ];


    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }


    public function seat()
    {
        return $this->belongsToMany(
            
            Seat::class,
            'bookings_seats',
            'booking_id',
            'seat_id'
        );
    }


}
