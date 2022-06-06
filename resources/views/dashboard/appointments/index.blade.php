@extends('dashboard.layouts.layout')
@section('title','  مواعيد حجز الخدمة'.' '. $service->name )

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    @if($service->is_offer == 0)
                        <a href="{{route('admin.services.index')}}" class="header-title m-t-0 m-b-30">
                            <i class="icon-home2 mr-2"></i> الخدمات </a> /
                        <span class="breadcrumb-item active">مواعيد حجز الخدمة
                        @else
                                <a href="{{route('admin.offers.index')}}" class="header-title m-t-0 m-b-30">
                                <i class="icon-home2 mr-2"></i> العروض </a> /
                                <span class="breadcrumb-item active">مواعيد حجز العرض </span>
                            @endif
                    <span class="badge badge-success">{{$service->name}}</span>
                         </span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <a href="{{route('admin.appointments.create',['service'=>$service->id])}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة ميعاد حجز
                                جديد
                            </a>
                            <br>
                            <br>

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اليوم</th>
                                    <th>من الساعة</th>
                                    <th>الى الساعة</th>
                                    <th>حالة اليوم</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($appointments as $index => $appointment)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{ $appointment->day->format('Y-m-d') .' || '.__($appointment->day->format('D'))}}</td>
                                        <td>{{$appointment->from->format('h:i:s a') }}</td>
                                        <td>{{$appointment->to->format('h:i:s a')}}</td>
                                        <td>{{__($appointment->day_status)}}</td>

                                        <td class="text-center">

                                            <a href="{{url(route('admin.appointments.edit',['appointment'=>$appointment->id]))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>

                                            <button data-url="{{route('admin.appointments.destroy',$appointment->id)}}"
                                                    class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                    title="حذف">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@include('dashboard.layouts.datatables_scripts')
