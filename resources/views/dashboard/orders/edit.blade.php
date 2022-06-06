@extends('dashboard.layouts.layout')
@section('title',' تعديل طلب   ' )

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.orders.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الطلبات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30"> تعديل الطلب رقم {{$order->id}}
                            </h4>

                            {!! Form::model($order,['route'=>['admin.orders.update',$order->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}


                            <div class="form-group row">
                                <label class="col-sm-2 control-label">العميل </label>
                                <div class="col-sm-4">
                                    {!! Form::select('user_id',$users,null,['class' =>'form-control '.($errors->has('user_id') ? ' is-invalid' : null)  ]) !!}
                                    @error('user_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-sm-2 control-label">الخدمة </label>
                                <div class="col-sm-4">
                                    {!! Form::select('service_id',$services,null,['class' =>'form-control '.($errors->has('service_id') ? ' is-invalid' : null)  ]) !!}
                                    @error('service_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الميعاد </label>
                                <div class="col-sm-4">
                                    {!! Form::select('appointment_id',$appointments,null,['class' =>'form-control '.($errors->has('appointment_id') ? ' is-invalid' : null)  ]) !!}
                                    @error('appointment_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">عدد الافراد</label>
                                <div class="col-md-4">
                                    {!! Form::number('no_of_persons',null,[
                                                       'class' =>'form-control '.($errors->has('no_of_persons') ? ' is-invalid' : null),
                                                       'placeholder'=> 'عدد الافراد' ,
                                                       ]) !!}
                                    @error('no_of_persons')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>



                            </div>


                            <div class="text-center form-group row">
                                <button type="submit"
                                        class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
                                    حفظ
                                </button>
                            </div>

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
        $(document).ready(function () {
            $('.select2').select2()
        })
    </script>
@endpush
