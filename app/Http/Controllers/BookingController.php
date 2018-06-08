<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Enumerations\BookingStatus;
use App\Enumerations\DateFormat;
use App\Http\Requests\StoreBooking;
<<<<<<< HEAD
use App\Optional;
=======
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e
use App\Price;
use App\Room;
use App\Rules\Duration;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Location;

/**
 * Class BookingController
 *
 */
class BookingController extends Controller
{
    private $data;
    /**
     * BookingController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('permission:create-booking|read-booking|update-booking|delete-booking');

        $this->data = [
            'pageTitle' => __('Booking Management'),
            'pageHeader' => __('Booking Management'),
            'pageSubHeader' => __('Manage your bookings here')
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->location['sedi'] = Location::groupBy('id')->orderBy('id')->get(['sede']);
        $this->data['rooms'] = Room::groupBy('pax')->orderBy('pax')->get(['pax']);

        return view('dashboard.booking-management', $this->data, $this->location);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBooking $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */

    public function store(StoreBooking $request)
    {

        $data = $request->all();

        $roomId = $data['roomId'];

        $room = Room::find($roomId);


        $time = explode(' - ', $data['bookingTime']);


        $start = Carbon::createFromFormat(DateFormat::DATE_RANGE_PICKER, $time[0])
                       ->toDateTimeString();
        $end = Carbon::createFromFormat(DateFormat::DATE_RANGE_PICKER, $time[1])
                     ->toDateTimeString();

        $start_hour = explode(" ",$start);
        $end_hour = explode(" ",$end);

        $diff_sec = strtotime($end_hour[1])-strtotime($start_hour[1]);
<<<<<<< HEAD
        $diff_day =(strtotime($end_hour[0])-strtotime($start_hour[0]))/86400; // prenotazione su più giorni
        $duration = $diff_sec/3600;

        if($diff_day==0) {

            if($duration>4){
                $duration = 8;
                $price = Price::where('duration','=',$duration)->where('price_id','=',$roomId)->get();

                $booking =  Booking::create([
                    'room_id' => $data['roomId'],
                    'booked_by' => Auth::user()->id,
                    'start_date' => $start,
                    'end_date' => $end,
                    'location_id' => $room->location_id,
                    'location' => $room->location,
                    'price' => $price[0]->price
                ]);

                $optional = Optional::create([
                    'booking_id' => $booking->id,
                ]);

                return response()->json([
                    'message' => __('Room :name is successfully booked!', ['name' => $data['roomName']])
                ]);


            } else {
                $price = Price::where('duration','=',$duration)->where('price_id','=',$roomId)->get();

                $booking =  Booking::create([
                    'room_id' => $data['roomId'],
                    'booked_by' => Auth::user()->id,
                    'start_date' => $start,
                    'end_date' => $end,
                    'location_id' => $room->location_id,
                    'location' => $room->location,
                    'price' => $price[0]->price
                ]);

                $optional = Optional::create([
                    'booking_id' => $booking->id,
                ]);

           //     return $optional;

                return response()->json([
                    'message' => __('Room :name is successfully booked!', ['name' => $data['roomName']])
                ]);
            }

        }else {
            $diff_day = $diff_day+1;

            $duration = 8;

            $price = Price::where('duration','=',$duration)->where('price_id','=',$roomId)->get();

            $price_final = ($price[0]->price)*$diff_day;


            $booking =  Booking::create([
                'room_id' => $data['roomId'],
                'booked_by' => Auth::user()->id,
                'start_date' => $start,
                'end_date' => $end,
                'location_id' => $room->location_id,
                'location' => $room->location,
                'price' => $price_final
            ]);

            $optional = Optional::create([
                'booking_id' => $booking->id,
            ]);

            return response()->json([
                'message' => __('Room :name is successfully booked!', ['name' => $data['roomName']])
            ]);
        }



=======

        $duration = $diff_sec/3600;

        if ($duration>5) {

            $duration = 8;

            $price = DB::table('prices')->where('duration','=',$duration)->where('price_id','=',$roomId)->get();

        } else {

            $price = DB::table('prices')->where('duration','=',$duration)->where('price_id','=',$roomId)->get();
        }


         Booking::create([
            'room_id' => $data['roomId'],
            'booked_by' => Auth::user()->id,
            'start_date' => $start,
            'end_date' => $end,
            'location_id' => $room->location_id,
            'location' => $room->location,
             'price' => $price[0]->price
        ]);
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $booking = Booking::with('room')->findOrFail($id);

        return $booking;

      //  abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::id();

        $pageTitle = 'edit booking';

        $booking = Booking::find($id);

        return view('dashboard.edit_booking',compact('booking','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $booking = Booking::find($id);

        $booking->status = $request->status;

        $booking->update();

        return redirect('dashboard/bookings');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->canDeleteBooking()) {
            return response()->json([
                'message' => __('You have no authorization to perform this action.')
            ], 403);
        }

        $booking = Booking::findOrFail($id);

        if ($booking->delete()) {
            $booking->status = BookingStatus::CANCELLED;
            $booking->save();
        }

        return response()->json([
            'message' => __('Booking on room :name is successfully cancelled!', ['name' => $booking->room->name])
        ]);
    }

    public function search(Request $request)
    {
        if (!auth()->user()->canCreateBooking()) {
            return response()->json([
                'errors' => [
                    'message' => __('You have no authorization to perform this action.')
                ]
            ], 403);
        }

        $data = $request->validate([
            'bookingTime' => [
                'bail',
                'required',
                new Duration()
            ],
            'pax' => 'required|integer|min:1',
            'location' => 'string'
        ]);


        $bookingTime = explode(' - ', $data['bookingTime']);

        $start = Carbon::createFromFormat(DateFormat::DATE_RANGE_PICKER, $bookingTime[0]);
        $end = Carbon::createFromFormat(DateFormat::DATE_RANGE_PICKER, $bookingTime[1]);

        $start_hour = explode(" ", $start);
        $end_hour = explode(" ", $end);
<<<<<<< HEAD

        $diff_sec = strtotime($end_hour[1]) - strtotime($start_hour[1]);

=======

        $diff_sec = strtotime($end_hour[1]) - strtotime($start_hour[1]);

        // Todo in case of duration is <> 4 end >8 //
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e
        /* $rooms = Room::with('prices')
                     ->Available($start, $end)
                     ->where('pax', '=', $data['pax'])
                     ->where('location','=',$data['location']) // Search in base alla sede
                     ->get(['name', 'pax', 'id', 'location','type','price_id']);
        */

<<<<<<< HEAD
        $duration = (integer)$diff_sec/3600;
        $diff_day =(strtotime($end_hour[0])-strtotime($start_hour[0]))/86400; // differenza tra date in giorni

        if($diff_day==0)
        {
            if($duration>4){
                $duration = 8;
                // Query ricerca disponibilita //
                $rooms = Room::Available($start, $end)
                    ->join('prices', function ($join) use ($duration) {
                        $join->on('prices.price_id', '=', 'rooms.id')
                            ->where('prices.duration', '=', $duration);
                    })
                    ->where('pax', '=', $data['pax'])
                    ->where('location', '=', $data['location'])// Search in base alla sede
                    ->get(['name', 'pax', 'id', 'location', 'type', 'price']);

                // Create book button
                $rooms = $rooms->each(function ($room) {
                    $bookUrl = route('bookings.store');
                    $bookBtn = '<button class="btn btn-xs btn-primary btn-book"';
                    $bookBtn .= 'data-remote="' . $bookUrl . '" data-name="' . $room->name . '" data-id="' . $room->id . '">';
                    $bookBtn .= '<span class="glyphicon glyphicon-edit"></span> ';
                    $bookBtn .= __('Book');
                    $bookBtn .= '</button>';

                    $room->action = $bookBtn;
                });

                $result = [];

                foreach ($rooms as $key => $value) {
                    $result[] = $value;
                }

                return response()->make($result);
            } else {

                // Query ricerca disponibilita //
                $rooms = Room::Available($start, $end)
                    ->join('prices', function ($join) use ($duration) {
                        $join->on('prices.price_id', '=', 'rooms.id')
                            ->where('prices.duration', '=', 1);
                    })
                    ->where('pax', '=', $data['pax'])
                    ->where('location', '=', $data['location'])// Search in base alla sede
                    ->get(['name', 'pax', 'id', 'location', 'type', 'price']);

                // Create book button
                $rooms = $rooms->each(function ($room) {
                    $bookUrl = route('bookings.store');
                    $bookBtn = '<button class="btn btn-xs btn-primary btn-book"';
                    $bookBtn .= 'data-remote="' . $bookUrl . '" data-name="' . $room->name . '" data-id="' . $room->id . '">';
                    $bookBtn .= '<span class="glyphicon glyphicon-edit"></span> ';
                    $bookBtn .= __('Book');
                    $bookBtn .= '</button>';

                    $room->action = $bookBtn;
                });

                $result = [];

                foreach ($rooms as $key => $value) {
                    $result[] = $value;
                }

                return response()->make($result);
            }

        }else {

            $diff_day = $diff_day+1;

            $duration = 8;
=======
        $duration = (integer)$diff_sec / 3600;

        if ($duration>5) {
            $duration = 8;
            // Query ricerca disponibilita //
            $rooms = Room::Available($start, $end)
                ->join('prices', function ($join) use ($duration) {
                    $join->on('prices.price_id', '=', 'rooms.id')
                        ->where('prices.duration', '=', $duration);
                })
                ->where('pax', '=', $data['pax'])
                ->where('location', '=', $data['location'])// Search in base alla sede
                ->get(['name', 'pax', 'id', 'location', 'type', 'price']);

            // Create book button
            $rooms = $rooms->each(function ($room) {
                $bookUrl = route('bookings.store');
                $bookBtn = '<button class="btn btn-xs btn-primary btn-book"';
                $bookBtn .= 'data-remote="' . $bookUrl . '" data-name="' . $room->name . '" data-id="' . $room->id . '">';
                $bookBtn .= '<span class="glyphicon glyphicon-edit"></span> ';
                $bookBtn .= __('Book');
                $bookBtn .= '</button>';

                $room->action = $bookBtn;
            });

            $result = [];

            foreach ($rooms as $key => $value) {
                $result[] = $value;
            }

            return response()->make($result);
        } else {
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e

            // Query ricerca disponibilita //
            $rooms = Room::Available($start, $end)
                ->join('prices', function ($join) use ($duration) {
                    $join->on('prices.price_id', '=', 'rooms.id')
                        ->where('prices.duration', '=', $duration);
                })
                ->where('pax', '=', $data['pax'])
                ->where('location', '=', $data['location'])// Search in base alla sede
                ->get(['name', 'pax', 'id', 'location', 'type', 'price']);

<<<<<<< HEAD

            foreach ($rooms as $room){
                 $room->price = $room->price*$diff_day;
            }

=======
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e
            // Create book button
            $rooms = $rooms->each(function ($room) {
                $bookUrl = route('bookings.store');
                $bookBtn = '<button class="btn btn-xs btn-primary btn-book"';
                $bookBtn .= 'data-remote="' . $bookUrl . '" data-name="' . $room->name . '" data-id="' . $room->id . '">';
                $bookBtn .= '<span class="glyphicon glyphicon-edit"></span> ';
                $bookBtn .= __('Book');
                $bookBtn .= '</button>';

                $room->action = $bookBtn;
            });

            $result = [];

            foreach ($rooms as $key => $value) {
                $result[] = $value;
            }

            return response()->make($result);
        }
<<<<<<< HEAD


=======
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e
    }
}
