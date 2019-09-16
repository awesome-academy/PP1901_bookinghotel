@extends('layouts.home_display')

@section('content')

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll">
            <img src="/upload_image/{{ $slide_subpages[5]['image'] }}" alt="">
        </div>
        <div class="home_content">
            <div class="home_title">{{ $slide_subpages[5]['title'] }}</div>
        </div>
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-5 title_booking">{{ __('Hình thức đặt phòng') }}</h3>
                    <form action="{{ route('member_booking') }}" method="post" novalidate>
                        @csrf

                        <input type="hidden" class="form-control" name="room_id" value="{{ $rooms['id'] }}">
                        <input type="hidden" class="form-control" name="status" value="{{ __('1') }}">

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="ip_form">{{ __('Họ và Tên') }}</label> <label
                                        class="obligatory">{{ __('*') }}</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="ip_form">{{ __('Số điện thoại') }}</label> <label
                                        class="obligatory">{{ __('*') }}</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label class="ip_form">{{ __('Check In') }}</label> <label
                                        class="obligatory">{{ __('*') }}</label>
                                <input type="date" value="{{ old('check_in') }}" name="check_in"
                                       class="form-control @error('check_in') is-invalid @enderror" >
                                @error('check_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>&emsp;{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="ip_form">{{ __('Check Out') }}</label> <label
                                        class="obligatory">{{ __('*') }}</label>
                                <input type="date" name="check_out" value="{{ old('check_out') }}"
                                       class="form-control @error('check_out') is-invalid @enderror" >
                                @error('check_out')
                                <span class="invalid-feedback" role="alert">
                                    <strong>&emsp;{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="ip_form">{{ __('Phòng') }}</label>
                                <input type="text" class="form-control form_readonly" value="{{ $rooms['name'] }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="ip_form">{{ __('Số người') }}</label>
                                <input type="text" class="form-control form_readonly" value="{{ $rooms['copacity_room'] }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="ip_form">{{ __('Ghi chú') }}</label>
                                <textarea name="note" id="message" class="form-control " cols="30"
                                          rows="3"></textarea>
                            </div>
                        </div>
                        @if(Auth::check() && Auth::user()->role == "admin")
                        @elseif(Auth::check() && Auth::user()->role == "member")
                            <p class="name_comment">{{ __('Bạn đang dùng tài khoản') }} <a
                                        href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a> {{ __('để đặt phòng!!') }}
                            </p>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Đặt Ngay') }}</button>
                                </div>
                            </div>
                        @else
                            <p>{{ __('Bạn phải đăng nhập rồi mới đặt phòng.') }}</p>
                        @endif



                    </form>
                </div>

                <div class="col-md-1"></div>

                <div class="col-md-5">
                    <h3 class="mb-5 title_booking">{{ __('Phòng đang chọn') }}</h3>
                    <div class="media d-block room mb-0">
                        <figure>
                            @foreach( $image_array['images'] as $key => $value )
                                @if($key == 0)
                                    <img src="/upload_image/{{ $value['images'] }}" class="img-fluid">
                                @endif
                            @endforeach

                            <div class="offer_name">
                                <a href="">{{ $rooms['name'] }}</a>
                            </div>
                        </figure>

                    </div>

                    <div class="media-body">
                        <ul class="room-specs">
                            <li class="price_room"><span
                                        class="price_room_1">{{ __('Giá phòng:') }}</span> {{ $rooms['price'] }}
                                <span>{{ __('VNĐ') }}</span></li>
                        </ul>
                        <p class="title_room">{{ $rooms['title'] }}</p>
                        <div class="offers_icons">
                            <ul class="offers_icons_list">
                                <li class="offers_icons_item">
                                    <img src="{{ asset('images/post.png') }}" alt="">
                                </li>
                                <li class="offers_icons_item">
                                    <img src="{{ asset('images/compass.png') }}" alt="">
                                </li>
                                <li class="offers_icons_item">
                                    <img src="{{ asset('images/bicycle.png') }}" alt="">
                                </li>
                                <li class="offers_icons_item">
                                    <img src="{{ asset('images/sailboat.png') }}" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
