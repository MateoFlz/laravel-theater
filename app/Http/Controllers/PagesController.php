<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

    public function __construct()
    {
        session(['seat' => []]);
    }

    public function bokings()
    {

        Session::forget('seat');
        Session::forget('partner');
        Session::forget('errors');

        $seats = Seat::all();
        return view('welcome', [
            'seats'   => $seats
        ]);
    }


    public function partners()
    {
        $partners = Partner::latest()
        ->paginate();
        return view('partner.index', [
            'partners' => $partners
        ]);
    }


    public function seats()
    {
        return view('welcome');
    }

}
