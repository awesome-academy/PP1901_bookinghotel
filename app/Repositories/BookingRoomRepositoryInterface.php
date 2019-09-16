<?php

namespace App\Repositories;


interface BookingRoomRepositoryInterface
{

    public function booking_user();

    public function room_id($request);

    public function booking_status($id);

}
