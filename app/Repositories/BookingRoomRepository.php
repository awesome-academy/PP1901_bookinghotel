<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Room;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class BookingRoomRepository implements BookingRoomRepositoryInterface
{
  public function booking_user()
  {
      // TODO: Implement booking_user() method.
      return Booking::with([
          'room' => function ($query) {
              $query->select(['id', 'name']);
          },
          'users' => function ($query) {
              $query->select(['id', 'name', 'email']);
          }])
          ->get();
  }

  public function room_id($request)
  {
      // TODO: Implement room_id() method.
      return Room::find($request->get('room_id'));
  }

    public function booking_status($id)
  {
      // TODO: Implement booking_status() method.
      return Booking::find($id);
  }
}
