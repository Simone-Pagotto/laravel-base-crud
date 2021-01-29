<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //impostando con coerenza il nome della tabella e il nome dell classe nel modello
    //non ho bisogno di fare il passaggio sotto
    protected $table = 'bookings';

   
}
