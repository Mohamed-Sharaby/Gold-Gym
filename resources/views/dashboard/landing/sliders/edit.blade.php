@extends('dashboard.layouts.layout')
@section('title',' تعديل سلايدر  ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.landing-sliders.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        السلايدر </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل بانر
                                <span class="badge badge-info">{{$slider->name}}</span>
                            </h4>

                            {!! Form::model($slider,['route'=>['admin.landing-sliders.update',$slider->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.landing.sliders.form')
                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
