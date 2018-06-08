<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

<<<<<<< HEAD
   protected $primaryKey = 'id_price';

    protected $fillable = [
        'price_id',
        'room_id',
        'price',
        'duration'
    ];
=======
    protected $primaryKey = 'price_id';
>>>>>>> 05f17d5bf530316ef136b8b6d08a360e970a768e

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
