@extends('layouts.App_admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> {{__('Slide Home')}}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> {{__('Table Slide Home')}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($slide_subpages as $slide_subpage)
                            <tr>
                                <td>{!! $slide_subpage->id !!}</td>
                                <td>{!! $slide_subpage->title !!}</td>
                                <td>
                                    <img src="/upload_image/{!! $slide_subpage->image !!}" alt=""
                                         style="width: 150px; height: 50px">
                                </td>
                                <td>
                                    <a href="{{ route('update_slide_subpage', $slide_subpage->id ) }}"
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
