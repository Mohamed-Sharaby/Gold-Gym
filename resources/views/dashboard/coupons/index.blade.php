@extends('dashboard.layouts.layout')
@section('title','كوبونات الخصم' )

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /

                    <span class="breadcrumb-item active">كوبونات الخصم

                    </span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <a href="{{route('admin.coupons.create' )}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة كوبون جديد
                            </a>
                            <br>
                            <br>

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الكوبون</th>
                                    <th>الكود</th>
                                    <th>نسبة الخصم</th>
                                    <th>تاريخ الانتهاء  </th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($coupons as $index => $coupon)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{ $coupon->name}}</td>
                                        <td>{{ $coupon->code}}</td>
                                        <td>{{ $coupon->value .' %'}}</td>
                                        <td>{{ $coupon->expire_at->format('Y-m-d')}}</td>

                                        <td class="text-center">

                                            <form
                                                action="{{ route('admin.active', ['id' => $coupon->id, 'type' => 'Coupon']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $coupon->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $coupon->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>

                                            <a href="{{url(route('admin.coupons.edit',$coupon->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>

                                            <button data-url="{{route('admin.coupons.destroy',$coupon->id)}}"
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
