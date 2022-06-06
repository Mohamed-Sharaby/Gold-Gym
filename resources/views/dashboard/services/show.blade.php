@extends('dashboard.layouts.layout')
@section('title','تفاصيل   الخدمة  '.' '.$service->name)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.services.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الخدمات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="portlet fadeIn">
                                <div class="portlet-heading bg-purple">
                                    <h3 class="portlet-title">
                                        تفاصيل   الخدمة / {{$service->name}}
                                    </h3>

                                    <div class="clearfix"></div>
                                </div>
                                <div id="details" class="panel-collapse collapse in">
                                    <div class="portlet-body">

                                        <table class="table table-bordered table-responsive table-striped">

                                            <tr>
                                                <th> الاسم بالعربية</th>
                                                <td>  {{$service->ar_name}} </td>
                                            </tr>
                                            <tr>
                                                <th> الاسم بالانجليزية</th>
                                                <td>  {{$service->en_name}} </td>
                                            </tr>

                                            <tr>
                                                <th>التفاصيل بالعربية</th>
                                                <td>  {!! $service->ar_description !!} </td>
                                            </tr>
                                            <tr>
                                                <th>التفاصيل بالانجليزية</th>
                                                <td>  {!! $service->en_description !!} </td>
                                            </tr>
                                            <tr>
                                                <th>الشروط بالعربية</th>
                                                <td>  {!! $service->ar_terms !!} </td>
                                            </tr>
                                            <tr>
                                                <th>الشروط بالانجليزية</th>
                                                <td>  {!! $service->en_terms !!} </td>
                                            </tr>

                                            <tr>
                                                <th>السعر</th>
                                                <td>  {{$service->price}} </td>
                                            </tr>

                                            <tr>
                                                <th>الصورة</th>
                                                <td>
                                                    @if($service->image)
                                                        <a data-fancybox="gallery" href="{{$service->image}}">
                                                            <img src="{{$service->image}}" width="70" height="70"
                                                                 class="img-thumbnail" alt="provider_img">
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>صور اضافية</th>
                                                <td>
                                                    <div class="row">

                                                        @foreach($service->getMedia('photos') as $photo)
                                                            <div class="col-md-4">
                                                                <a data-fancybox="gallery" href="{{$photo->getUrl()}}">
                                                                    <img src="{{$photo->getUrl()}}" width="100" height="100"
                                                                         class="img-thumbnail">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
