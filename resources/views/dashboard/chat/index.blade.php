@extends('dashboard.layouts.layout')
@section('title','محادثات الدعم الفنى  ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم العميل</th>
                                    <th>اخر رسالة</th>
                                    <th>تاريخ التحديث</th>
                                    <th>عدد الرسايل غير المقروءة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($chats as  $chat)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$chat->user->name}}</td>
                                        <td>{{$chat->messages()->latest()->first()->message}}</td>
                                        <td>{{$chat->updated_at}}</td>
                                        <td>{{$chat->unReadCount()}}</td>

                                        <td class="text-center">

                                            <a href="{{url(route('admin.chats.show',$chat->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-eye"></i></a>
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
