@extends('dashboard.layouts.layout')
@section('title',' اضافة  كوبون   جديد')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.coupons.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                           الكوبونات  </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            {{--                            @include('dashboard.layouts.status')--}}
                            <h4 class="header-title m-t-0 m-b-30"> اضافة كوبون خصم جديد</h4>

                            {!!Form::open( ['route' => 'admin.coupons.store', 'method' => 'Post','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.coupons.form')
                            {!!Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
