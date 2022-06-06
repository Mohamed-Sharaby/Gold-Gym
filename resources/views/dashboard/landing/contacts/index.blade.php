@extends('dashboard.layouts.layout')
@section('title','تواصل معنا')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكترونى</th>
                                    <th>الجوال</th>
                                    <th>الرسالة</th>
                                    <th>التاريخ</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($contacts as $index => $contact)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>

                                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                                    data-target="#item{{$contact->id}}">عرض الرسالة
                                            </button>
                                            <!--  Modal content for the above example -->
                                            <div class="modal fade bs-example-modal-lg" id="item{{$contact->id}}"
                                                 tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                 aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×
                                                            </button>
                                                            <h4 class="modal-title" id="myLargeModalLabel">
                                                                الرسالة       </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                {{$contact->message}}
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </td>
                                        <td>{{$contact->created_at->toDateString()}}</td>
                                        <td class="text-center">
                                            <button data-url="{{route('admin.landing-contacts.destroy',$contact->id)}}"
                                                    class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete" title="Delete">
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
