<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

/**
 * Class FullcalendarController
 *
 * @package App\Http\Controllers
 * @author Pisyek K
 * @url www.pisyek.com
 * @copyright © 2017 Pisyek Studios
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
