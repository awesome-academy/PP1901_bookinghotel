<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingFormRequest;
use App\Models\Booking;
use App\Repositories\BookingRoomRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    protected $bookingroomRepository;

    public function __construct(BookingRoomRepositoryInterface $bookingroomRepository)
    {
        $this->bookingroomRepository = $bookingroomRepository;
    }


    public function index_booking()
    {
        $bookings = $this->bookingroomRepository->booking_user();

        return view('admin.booking.index_booking', compact('bookings'));

    }

    public function member_booking(BookingFormRequest $request)
    {
        $rooms = $this->bookingroomRepository->room_id($request);
        if (empty($rooms)) {
            abort(404);
        }
        $rooms_id = $rooms['id'];
        $bookings = new Booking();
        $bookings->name = $request->get('name');
        $bookings->phone = $request->get('phone');
        $bookings->check_in = $request->get('check_in');
        $bookings->check_out = $request->get('check_out');
        $bookings->note = $request->get('note');
        $bookings->room_id = $request->get('room_id');
        $bookings->user_id = (Auth::user()->id);
        $bookings->status = $request->get('status');
        $bookings->save();

        return redirect()->route('myroom', compact('rooms_id'));
    }

    public function status_booking($id)
    {
        $status_bookings = $this->bookingroomRepository->booking_status($id);
        if ($status_bookings) {
            return view('admin.booking.status_booking', compact('status_bookings'));
        }

        abort(404);

    }

    public function status_booking_save(Request $request, $id)
    {
        $status_bookings = $this->bookingroomRepository->booking_status($id);
        if ($status_bookings){
            $status_bookings->status = $request->status;
            $status_bookings->save();

            return redirect()->route('index_booking', compact('status_bookings'));
        }

        abort(404);

    }
}
