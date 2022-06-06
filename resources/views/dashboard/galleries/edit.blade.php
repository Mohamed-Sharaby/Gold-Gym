@extends('dashboard.layouts.layout')
@section('title',' تعديل المكتبة   ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.galleries.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        مكتبة الصور والفيديوهات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل الخبر
                                <span class="badge badge-info">{{$gallery->name}}</span>
                            </h4>


                            {!! Form::model($gallery,['route'=>['admin.galleries.update',$gallery->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.galleries.form')
                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
@section('my-js')
    <script>
        $(document).ready(function () {
            $('#category_id').on('change', function (e) {
                $('#service_id').empty();
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: '/getServices/' + category_id,
                        method: 'GET',
                        type: 'json',
                        success: function (data) {
                            $('#service_id').empty();
                            $.each(data, function (key, value) {
                                $('#service_id').append('<option value="' + key + '" >' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#service_id').empty();
                }
            });
        });
    </script>
@endsection
