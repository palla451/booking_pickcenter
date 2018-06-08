<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    protected $fillable = [
        'booking_id',
        'Coffee break',
        'Quick Lunch',
        'Videoproiettore',
        'Permanent Coffee',
        'WiFi',
        '1° connessione Internet via cavo',
        'Videoconferenza',
        'Web conference',
        'Lavagna fogli mobili',
        'Connessioni internet via cavo successive',
        'Stampante',
        'Permanent Coffee Plus',
        'Upgrade Banda Max 10 Mb',
        'Upgrade Banda Max 8Mb',
        'Upgrade Banda Max 20Mb',
        'Wireless fino a 4Mb max 20 Accessi',
        'Wireless fino a 8Mb max 35 Accessi',
        'Wireless fino a 10MB max 50 Accessi',
        'Videoregistrazione',
        'Fattorino',
        'Lavagna Interattiva'
    ];


}
