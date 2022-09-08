<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Models\Booking;
use App\Models\BookingSeat;
use App\Models\Seat;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{

    public function save(Seat $seat)
    {
        Session::forget('errors');

        BookingService::validateBySeat($seat);

        $seats = Seat::all();
        return view('welcome', [
            'seats'   => $seats
        ]);
    }


    public function create(Booking $booking)
    {
        return view('booking.create', [
            'booking' => $booking
        ]);
    }


    public function store(StoreBookingRequest $request)
    {
    
        dd($request->all());
    }


    public function edit(Booking $booking)
    {
        return view('booking.edit', [
            'booking' => $booking
        ]);
    }


    public function update(StoreBookingRequest $request)
    {

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
        return back();
    }
}
