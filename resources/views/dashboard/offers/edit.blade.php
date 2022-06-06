@extends('dashboard.layouts.layout')
@section('title',' تعديل عرض   ' )

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.offers.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                            العروض     </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30"> تعديل عرض
                            </h4>

                            {!! Form::model($offer,['route'=>['admin.offers.update',$offer->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.offers.form')
                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
@push('my-js')
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        });

        // Time Picker
        jQuery('#timepicker').timepicker({
            defaultTIme : false
        });

        jQuery('#timepicker2').timepicker({
            defaultTIme : false
        });

    </script>
@endpush
