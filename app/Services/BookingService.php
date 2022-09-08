<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\BookingsSeat;
use App\Models\Seat;
use Illuminate\Support\Facades\Session;

/**
 * Class BookingService.
 */
class BookingService
{

    public static function validateBySeat(Seat $seat)
    {
        $bookingSeat = BookingsSeat::where('seat_id', $seat->id)
        ->where('state', 1)
        ->first();

        if(self::validateByPartner()) {

            $seats = Seat::all();
            return redirect()->route('bokings', [
                'seats'   => $seats
            ])->with('errors', 'No ha ingreado ningun socio');

        }

        if(!empty($bookingSeat)) {
            $seats = Seat::all();
            return redirect()->route('bokings', [
                'seats'   => $seats
            ])->with('errors', 'La butaca ya se encuentra reservada');
        }


        if(session()->has('seat')) {

            foreach(session('seat') as $key => $value) {
                if (array_search($seat->id, session('seat')[$key])) return;
            }

            Session::push(
                'seat',
                [
                    'id_seat' => $seat->id,
                    'position' => $seat->position_x . '-' . $seat->position_y
                ]
            );

        } else {
            Session::put(
                'seat',
                [
                    [
                        'id_seat' => $seat->id,
                        'position' => $seat->position_x . '-' . $seat->position_y
                    ]
                ]
            );
        }
    }


    public static function validateByPartner()
    {
        return !session()->has('partner');
    }

    public static function validateByBooking(Booking $booking, $id)
    {
        $bookingSeat = BookingsSeat::where('seat_id', $id)
        ->where('state', 1)
        ->first();

        if($bookingSeat)  return true;
        return false;
    }
}
