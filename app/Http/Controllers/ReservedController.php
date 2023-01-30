<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Reserved;
use Illuminate\Http\Request;

class ReservedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserved::where('user_id',\Auth::user()->id)->get();
        return view('index')->with('reservas', $reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $turnos = Booking::whereDate('start_time', $request->fecha)->get();
        $datos = [
            'turnos' => $turnos,
            'fecha' => $request->fecha,
         ]; 
        return view('reserve')->with($datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->booking_id);
        $booking = Booking::find($request->booking_id);
        $booking->cupo = $booking->cupo - 1;
        $booking->save();

        $reserved = new Reserved();
        $reserved->user_id = $request->user_id;
        $reserved->booking_id = $request->booking_id;
        $reserved->save();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserved  $reserved
     * @return \Illuminate\Http\Response
     */
    public function show(Reserved $reserved)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserved  $reserved
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserved $reserved)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserved  $reserved
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserved $reserved)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserved  $reserved
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserved $reserved)
    {
        //
    }
}
