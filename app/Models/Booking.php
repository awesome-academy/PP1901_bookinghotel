<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //


    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'id');
    }

}
