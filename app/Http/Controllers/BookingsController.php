<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//definito il modell del controller
use App\Booking;

//importo la facade DB
use Illuminate\Support\Facades\DB;

//importo facade validator
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //definisco controlli da apllicare dal validatore
        $validatore = Validator::make(
            $request->all(),
            [
                'q' => 'string|min:3'//coppie chiave/valore
            ]
        );

        if(!$validatore->fails()){
            //se il validatore non fallisce compio il filtraggio dei dati
            $bookings = Booking::where('guest_full_name','LIKE',"%$request->q%")->get();//query che filtra il mio elencone
        }else{
            //la rotta che mostra tutti gli elementi
            $bookings = Booking::all();

        }

        
        //ci ricava i nomi delle colonne
        //$columns = DB::getSchemaBuilder()->getColumnListing('bookings');

        //definisco le colonne che voglio visulizzare
        $columns = [
            'id' => '#',
            'guest_full_name' => 'Nome Cognome',
            'room' => 'Room N°',

        ];
        //in base all'errore del validatore posso impostare un if e modificare la view in base a ciò che succede
        return view('bookings.index', compact('bookings','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//store ha una iniezione di tipo rquest: richiesta http
    {
        //inserire nuovi elementi nel db la cui visualizzazione è forita da create

        $newBooking = new Booking();

        $newBooking->guest_full_name = $request->input('full_name');
        $newBooking->guest_credit_card = $request->input('credit_card');
        $newBooking->room = $request->input('room');
        $newBooking->from_date = $request->input('from_date');
        $newBooking->to_date = $request->input('to_date');
        $newBooking->more_details = $request->input('more_details');
        

        $newBooking->save();

        return view('bookings.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $booking = Booking::find($id);

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
