@extends('dashboard.layouts.layout')
@section('title',' اضافة  ميعاد حجز جديد')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.appointments.index',['service'=>$service->id])}}"
                       class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                         مواعيد حجز {{$service->is_offer == 0 ? 'الخدمة':'العرض'}}
                        <span class="badge badge-success">{{$service->name}}</span> </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            {{--                            @include('dashboard.layouts.status')--}}
                            <h4 class="header-title m-t-0 m-b-30"> اضافة ميعاد حجز</h4>

                            {!!Form::open( ['route' => 'admin.appointments.store', 'method' => 'Post','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.appointments.form')
                            {!!Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
@push('my-js')
    <script>
        // Time Picker
        jQuery('#timepicker').timepicker({
            defaultTIme : false
        });

        jQuery('#timepicker2').timepicker({
            defaultTIme : false
        });
    </script>
    @endpush
