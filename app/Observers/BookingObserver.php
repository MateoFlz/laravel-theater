<?php

namespace App\Observers;

use App\Models\Booking;
use App\Models\BookingsSeat;
use Illuminate\Support\Facades\Log;

class BookingObserver
{
    /**
     * Handle the Booking "created" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        $position = '';

        foreach(session('seat') as $key => $value) {
            BookingsSeat::create([
                'booking_id' => $booking->id,
                'seat_id'    => session('seat')[$key]['id_seat'],
                'state'      => 1
            ]);
            $position .= '['. session('seat')[$key]['position'] . ']';
        }

        Log::channel('booking')
        ->info("[Info reserva]: El socio " . session('partner')->name . " " . session('partner')->surnames . " reservo para la fecha: " . $booking->date . " las siguientes butacas [ " . $position . " ]");
    }

    /**
     * Handle the Booking "updated" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {
        BookingsSeat::where('booking_id', $booking->id)
        ->delete();
    }

    /**
     * Handle the Booking "deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function restored(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function forceDeleted(Booking $booking)
    {
        //
    }
}
