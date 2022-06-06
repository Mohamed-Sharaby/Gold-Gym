@extends('dashboard.layouts.layout')
@section('title',' تعديل الخدمة   '.' '.$service->name)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.services.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الخدمات       </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل الخدمة
                                <span class="badge badge-info">{{$service->name}}</span>
                            </h4>

                            {!! Form::model($service,['route'=>['admin.services.update',$service->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.services.form')
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
        $(document).on('click', '.del_photo', function (e) {
            let confirmResult = confirm('هل أنت متأكد من حذف هذة الصورة  ؟');
            if (confirmResult) {
                var id = $(this).data('id');
                $.ajax({
                    type: 'delete',
                    url: "/delete/photo/" + id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id,
                    },
                    success: function (data) {
                        $('.msg').css('display', 'block');
                        $('.photo' + data.id).remove();
                    }
                });
            } else {
                e.preventDefault();
            }
        });
    </script>
@endpush
