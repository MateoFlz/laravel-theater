<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingsSeat;
use App\Models\Seat;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BokingSeatController extends Controller
{

    public function save(Booking $booking, Seat $seat)
    {

        if (BookingService::validateByBooking($booking, $seat->id)) {

            return back()
            ->with('errors', 'Butaca reservada');
        }

        BookingsSeat::create([
            'booking_id' => $booking->id,
            'seat_id'    => $seat->id,
            'state'      => 1
        ]);

        return back()
        ->with('message', 'Reserva creada satifactoriamente');
    }

    public function destroy($booking_id, $seat_id)
    {
        BookingsSeat::where('booking_id', $booking_id)
        ->where('seat_id', $seat_id)
        ->delete();

        return back()->with('message', 'butaca eliminada');
    }
}
