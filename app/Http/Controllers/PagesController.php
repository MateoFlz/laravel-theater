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
        
        $seats = Seat::all();
        return view('welcome', [
            'seats'   => $seats,
            'partner' => '',
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
