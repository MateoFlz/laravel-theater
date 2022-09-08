<?php

namespace App\Http\Controllers;

use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;
use App\Models\Partner;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{


    public function index(Request $request)
    {

        $seats   = Seat::all();
        $partner = Partner::where(
            $request->type,
            $request->search
        )
        ->first();

        session(['partner' =>  $partner]);

        Session::forget('errors');

        return view('welcome', [
            'seats'   => $seats
        ])->with('errors', 'Usuario encontrado');
    }


    public function create(Partner $partner)
    {
        return view('partner.create', [
            'partner' => $partner
        ]);
    }


    public function store(StorePartnerRequest $request)
    {
        Partner::create([
            'dni'      => $request->dni,
            'name'     => $request->name,
            'surnames' => $request->surnames,
            'date'     => $request->date
        ]);

        return redirect()
        ->back()
        ->with('message','Socio creado satifactoriamente.');
    }


    public function edit(Partner $partner)
    {
        return view('partner.edit', [
            'partner' => $partner
        ]);
    }


    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $partner->update([
            'dni'      => $request->dni,
            'name'     => $request->name,
            'surnames' => $request->surnames,
            'date'     => $request->date
        ]);

        return redirect()
        ->route('partner.edit', $partner)
        ->with('message', 'Socio actualizado satifactoriamente');
    }


    public function destroy(Partner $partner)
    {
        $partner->delete();
        return back();
    }

}
