<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

/**
 * Class FullcalendarController
 */
class FullcalendarController extends Controller
{
    public static function getBookingByRoomId($id)
    {
        $booking = Booking::where('room_id', '=', $id)
                            ->orderBy('start_date')
                            ->get([
                                'booked_by',
                                'start_date',
                                'end_date',
                            ]);

        return $booking->map(function($event) {
            $booking['title'] = 'Booked by ' . $event->user->name;
            $booking['start'] = $event->start_date->toDateTimeString();
            $booking['end'] = $event->end_date->toDateTimeString();
            return $booking;
        });
    }
}
