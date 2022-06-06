@extends('dashboard.layouts.layout')
@section('title')
    {{$page}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.settings.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الاعدادات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <form action="{{route('admin.settings.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    @foreach($settings as $setting)
                                        <div class="row  col-12 form-group">

                                            <label for="{{$setting->title}}"
                                                   class="col-form-label font-weight-bold col-lg-2">{{__($setting->title)}}
                                                {{$setting->name == 'tax' || $setting->name == 'added_value' ? '( % )' : ''}}
                                            </label>


                                            @if($setting->type == 'text' && $setting->name == 'address')
                                                <div class="col-12 col-lg-10">
                                                    <input type="text" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="العنوان" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'number' && $setting->name == 'whatsapp')
                                                <div class="col-12 col-lg-10">
                                                    <input type="tel" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="الواتس آب  " class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif
                                            @if($setting->type == 'number' && $setting->name == 'telegram')
                                                <div class="col-12 col-lg-10">
                                                    <input type="tel" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="التليجرام" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'number' && $setting->name == 'added_value')
                                                <div class="col-12 col-lg-10">
                                                    <input type="number" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="القيمة المضافة" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'number' && $setting->name == 'tax')
                                                <div class="col-12 col-lg-10">
                                                    <input type="number" name="{{$setting->name}}"
                                                           value="{{$setting->value}}" min="1" max="99"
                                                           placeholder="الضريبة  " class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            @endif
                                            @if($setting->type == 'number' && $setting->name == 'tax_status')
                                                <div class="col-12 col-lg-6">
                                                    {!! Form::select($setting->name,tax_status(),$setting->value,['class' =>'form-control js-example-basic-multiple select2']) !!}
{{--                                                    <select name="{{$setting->name}}" class="form-control ">--}}
{{--                                                        <option value="0" {{$setting->value == '0' ? 'selected': ''}}>غير مفعل</option>--}}
{{--                                                        <option value="1" {{$setting->value == '1' ? 'selected': ''}}>مفعل</option>--}}
{{--                                                    </select>--}}
                                                </div>
                                            @endif

                                            @if($setting->type == 'number' && $setting->name == 'phone')
                                                <div class="col-12 col-lg-10">
                                                    <input type="tel" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="رقم الهاتف" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'number' && $setting->name == 'mobile')
                                                <div class="col-12 col-lg-10">
                                                    <input type="tel" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="رقم الجوال" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'email')
                                                <div class="col-12 col-lg-10">
                                                    <input type="email" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="البريد الالكترونى" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'url')
                                                <div class="col-12 col-lg-10">
                                                    <input type="url" name="{{$setting->name}}"
                                                           value="{{$setting->value}}"
                                                           placeholder="الرابط" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif

                                            @if($setting->type == 'long_text')

                                                <div class="col-12 col-lg-10">
                                                    <label for="{{$setting->ar_title}}"
                                                           class="col-form-label">العنوان </label>
                                                    {!! Form::text($setting->name.'[]',$setting->ar_title,['class'=>'form-control']) !!}

                                                    <label for="{{$setting->ar_value}}"
                                                           class="col-form-label">المحتوى بالعربية</label>
                                                    {!! Form::textarea($setting->name.'[]',$setting->ar_value,['class'=>'form-control ck-editor','rows'=>4]) !!}

                                                    <label for="{{$setting->en_value}}"
                                                           class="col-form-label">المحتوى بالانجليزية </label>
                                                    {!! Form::textarea($setting->name.'[]',$setting->en_value,['class'=>'form-control ck-editor','rows'=>4]) !!}

                                                </div>
                                            @endif

                                        </div>
                                    @endforeach
                                    <div class="form-group row col-12">
                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                    </div>
                            </form>

                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@section('my-js')
    <script>
        CKEDITOR.replaceClass = 'ck-editor';
    </script>
@endsection
