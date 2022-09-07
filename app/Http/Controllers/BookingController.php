<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{

    public function obtener()
    {
        $seats=session('seat');
        if (!$seats) {
            $seats=[];
        }
        return $seats;
    }

    public function guardar($seats)
    {
     session(["seats"=>$seats]);
    }



    public function save(Seat $seat)
    {




        // $seats=$this->obtener();
        // $json= ['id_seat' => $seat->id,
        // 'position' => $seat->position_x . '-' . $seat->position_y];
        // array_push($seats,$json);

        var_dump(session()->has('seat'));
        // exit();

        if(session()->has('seat')) {
            Session::push(
                'seat', [
                    'id_seat' => $seat->id,
                    'position' => $seat->position_x . '-' . $seat->position_y
                ]
            );

        } else {
            Session::put('seat', [
                'id_seat' => $seat->id,
                'position' => $seat->position_x . '-' . $seat->position_y
            ]);


        }

        var_dump(session('seat'));

        $seats   = Seat::all();
        return view('welcome', [
            'seats'   => $seats,
            'partner' => '',
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
        // Partner::create([
        //     'dni'      => '',
        //     'name'     => '',
        //     'surnames' => '',
        //     'date'     => ''
        // ]);

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


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back();
    }
}
