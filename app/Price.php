<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    protected $primaryKey = 'price_id';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
