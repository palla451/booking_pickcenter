<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Optional;
use Illuminate\Http\Request;

class OptionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.optional_booking');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function show(Optional $optional)
    {
        return view('dashboard.optional_booking');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $optionals = Optional::findOrFail($id);

        return view('dashboard.optional_booking', compact('optionals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // aggiorno la tabella optionals //
        $optional = Optional::findOrfail($id);

        $optional->user_coffee_break = $request->input('user_coffee_break');
        $optional->coffee_break = $this->coffeebreak($optional->user_coffee_break);

        $optional->update();

        // aggiorno la tabella Booking aggiungendo
        // il prezzo totale degli optional
        // ed aggiorno il totale complessivo del booking
        $booking = Booking::find($id);
        $booking->price_tot_optional = $this->coffeebreak($optional->user_coffee_break);
        $booking->total_price = $booking->price + $booking->price_tot_optional;

        $booking->update();

        return $booking;


     /*   $optional->coffe_break = $this->coffee_break($request->input('coffe_break'));
        $optional->quick_lunch = $request->quick_lunch;
        $optional->videoproiettore = $request->videoproiettore;
        $optional->permanent_coffee = $request->permanent_coffee;
        $optional->quick_lunch = $request->wifi;
        $optional->videoconferenza = $request->videoconferenza;
        $optional->web_conference = $request->web_conference;
        $optional->lavagna_fogli_mobili = $request['lavagna_fogli_mobili'];
        $optional->stampante = $request['stampante'];
        $optional->permanent_coffee_plus = $request['permanent_coffee_plus'];
        $optional->connessione_internet_cavo = $request['connessione_internet_cavo'];
        $optional->integrazione_permanent_coffee = $request['integrazione_permanent_coffee'];
        $optional->upgrade_banda_max_10Mb = $request['upgrade_banda_max_10Mb'];
        $optional->upgrade_banda_max_8Mb = $request['upgrade_banda_max_8Mb'];
        $optional->upgrade_banda_max_20Mb = $request['upgrade_banda_max_20Mb'];
        $optional->wireless_fino_4Mb_max_20accessi = $request['wireless_fino_4Mb_max_20accessi'];
        $optional->wireless_fino_8Mb_max_35accessi = $request['wireless_fino_8Mb_max_35accessi'];
        $optional->wireless_fino_8Mb_max_50accessi = $request['wireless_fino_8Mb_max_50accessi'];
        $optional->wireless_fino_10MB_max_50accessi  = $request['wireless_fino_10MB_max_50accessi'];
        $optional->videoregistrazione = $request['videoregistrazione'];
        $optional->fattorino = $request['fattorino'];
        $optional->lavagna_interattiva = $request['lavagna_interattiva'];
    */

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Optional $optional)
    {
        //
    }

    /* calcola prezzo totale coffee_break */
    public function coffeebreak($user){
        $const = 6.5;
        $price = number_format($const, 2);
        return $price*$user;
    }

    public function addColumn(){
        Schema::table('optionals', function (Blueprint $table) {
            $table->string('test');
        });
    }



}
