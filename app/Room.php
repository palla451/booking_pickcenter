<?php

namespace App;

use App\Enumerations\BookingStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * Room model
 *
 * @package App
 * @author Pisyek K
 * @url www.pisyek.com
 * @copyright © 2017 Pisyek Studios
 */
class Room extends Model
{
    protected $fillable = [
        'name',
        'pax',
        'location'
    ];

    /**
     * Get available room for booking
     *
     * @param $query
     * @param $start
     * @param $end
     * @return mixed
     */
    public static function scopeAvailable($query, $start, $end)
    {
        $unavailableRooms = Booking::where([
                                        ['start_date', '>=', $start],
                                        ['end_date', '<=', $end],
                                        ['status', '=', BookingStatus::ACTIVE]
                                    ])
                                    ->orWhere(function($query) use ($start, $end){
                                        $query->where([
                                            ['start_date', '<=', $start],
                                            ['end_date', '>=', $end],
                                            ['status', '=', BookingStatus::ACTIVE]
                                        ]);
                                    })
                                    ->orWhere(function($query) use ($start, $end){
                                        $query->where([
                                            ['start_date', '>', $start],
                                            ['start_date', '<', $end],
                                            ['end_date', '>=', $end],
                                            ['status', '=', BookingStatus::ACTIVE]
                                        ]);
                                    })
                                    ->orWhere(function($query) use ($start, $end){
                                        $query->where([
                                            ['start_date', '<=', $start],
                                            ['end_date', '>', $start],
                                            ['end_date', '<', $end],
                                            ['status', '=', BookingStatus::ACTIVE]
                                        ]);
                                    })
                                    ->distinct()
                                    ->get();

        return $query->whereNotIn('id', $unavailableRooms->pluck('room_id'));
    }
}
