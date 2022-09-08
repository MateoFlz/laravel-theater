<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\BookingsSeat;
use App\Models\Seat;
use App\Services\BookingService;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{


    public function index()
    {
        Session::flush();

        $booking = Booking::latest()->get();
        return view('booking.index',[
            'bookings' => $booking
        ]);
    }


    public function save(Seat $seat)
    {
        Session::forget('errors');

        BookingService::validateBySeat($seat);

        $seats = Seat::all();
        return view('welcome', [
            'seats'   => $seats
        ]);
    }

    public function store(StoreBookingRequest $request)
    {

        Booking::create([

            "partner_id" => $request->partner_id,
            "date"       => $request->date,
            "state"      => $request->state
        ]);

        $seats = Seat::all();
        return redirect()->route('bokings', [
            'seats'   => $seats
        ])->with('message', 'Reserva creada satifactoriamente');

    }


    public function edit(Booking $booking)
    {


        $seats       = Seat::all();
        $bookingseat = BookingsSeat::where('state', 1)->get();

        return view('booking.edit', [

            'booking'     => $booking,
            'seats'       => $seats,
            'bookingseat' => $bookingseat
        ]);
    }


    public function update(UpdateBookingRequest $request, Booking $booking)
    {

        $booking->update([
            'date'  => $request->date,
            'state' => $request->state
        ]);

        return back()->with('message', 'Reserva editada satifactoriamente');
    }

    public function delete($id)
    {
        $array = [];
        foreach(session('seat') as $key => $value) {

            if (!array_search($id, session('seat')[$key])){
                array_push($array, session('seat')[$key]);
            };
        }
        session(['seat' => $array]);

       $seats = Seat::all();
        return view('welcome', [
            'seats'   => $seats
        ]);

    }


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('message', 'Reserva eliminada');
    }
}
