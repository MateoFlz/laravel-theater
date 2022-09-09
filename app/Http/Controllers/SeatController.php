<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seat\StoreSeatRequest;
use App\Models\Booking;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function create(Seat $seat)
    {
        $seats = Seat::first();
        return view('seat.create', [
            'seat'  => $seat,
            'seats' => $seats
        ]);
    }


    public function store(StoreSeatRequest $request)
    {
        $position_x = $request->position_x;
        $position_y = $request->position_y;

        for ($x=1; $x <= $position_x; $x++) {

            for ($y=1; $y <= $position_y; $y++) {

                Seat::create([
                    'position_x' => $x,
                    'position_y' => $y,
                ]);
            }
        }

        return redirect()
        ->back()
        ->with('message','Butacas creadas satifactoriamente.');
    }


    public function edit(Seat $seat)
    {
        return view('seat.edit', [
            'seat' => $seat
        ]);
    }

    public function destroy(Seat $seat)
    {
        Seat::getQuery()->delete();
        Booking::getQuery()->delete();
        return back();
    }
}
