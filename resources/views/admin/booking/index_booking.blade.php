@extends('layouts.App_admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> {{__('Booking')}}</h1>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> {{__('Table Booking')}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Id')}}</th>
                            <th scope="col">{{ __('Họ tên')}}</th>
                            <th scope="col">{{ __('Email')}}</th>
                            <th scope="col">{{ __('Số điện thoại')}}</th>
                            <th scope="col">{{ __('Ngày đến')}}</th>
                            <th scope="col">{{ __('Ngày đi')}}</th>
                            <th scope="col">{{ __('Phòng')}}</th>
                            <th scope="col">{{ __('Trạng thái')}}</th>
                            <th scope="col">{{ __('Actions')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{--@dd($bookinges)--}}

                        @foreach($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $booking['id'] }}</th>
                                <th scope="row">{{$booking['name']}}</th>
                                <td>{{ $booking['users']['email'] }}</td>
                                <td>{{ $booking['phone'] }}</td>
                                <td>{{ $booking['check_in'] }}</td>
                                <td>{{ $booking['check_out'] }}</td>
                                <td>
                                    <a href="{{ Route('detail', $booking['room_id']) }}">
                                        {{ __('Xem Phòng') }}
                                    </a>
                                </td>

                                <td>
                                    @if($booking['status'] == 1)
                                        <button class="btn btn-outline-warning waves-effect">
                                            {{ __('Đang chờ xử lý') }}
                                        </button>
                                    @elseif($booking['status'] == 2)
                                        <button class="btn btn-outline-success waves-effect">
                                            {{ __('Đặt phòng thành công') }}
                                        </button>
                                    @else
                                        <button class="btn btn-outline-danger waves-effect">
                                            {{ __('Phòng đặt đã bị hủy') }}
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('status_booking', $booking['id']) }}"
                                       class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
