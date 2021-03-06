@extends('dashboard.layouts.layout')
@section('title','العروض' )

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /

                    <span class="breadcrumb-item active">العروض

                    </span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <a href="{{route('admin.offers.create' )}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة عرض جديد
                            </a>
                            <br>

                            {{$dataTable->table(['class'=>'table table-striped table-bordered text-center'])}}
                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@include('dashboard.layouts.datatables_scripts',['yajra'=>true])

