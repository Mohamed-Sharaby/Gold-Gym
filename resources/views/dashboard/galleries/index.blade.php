@extends('dashboard.layouts.layout')
@section('title','مكتبة الصور والفيديوهات')

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

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <a href="{{route('admin.galleries.create')}}"
                                       class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة صورة او فيديو
                                        جديد</a>
                                    <br>
                                    <br>
                                </div>

                            </div>

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>النوع</th>
                                    <th>الاسم</th>
                                    <th>الصورة /  الفيديو </th>
                                    <th>الوصف  </th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($galleries as $index => $gallery)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$gallery->type == 'image' ? 'صورة':'فيديو'}}</td>
                                        <td>{{$gallery->name}}</td>
                                        <td>
                                            @if($gallery->type == 'image')
                                                <a data-fancybox="gallery" href="{{getImgPath($gallery->image)}}">
                                                    <img src="{{getImgPath($gallery->image)}}" width="70" height="70"
                                                         class="img-thumbnail" alt="provider_img">
                                                </a>
                                            @else
                                                <a href="{{$gallery->video_link}}">{{$gallery->video_link}}</a>
                                            @endif
                                        </td>

                                        <td>{{$gallery->description}}</td>
                                        <td class="text-center">

                                            <form
                                                action="{{ route('admin.active', ['id' => $gallery->id, 'type' => 'Gallery']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $gallery->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $gallery->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>

                                            <a href="{{url(route('admin.galleries.edit',$gallery->id))}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.galleries.destroy',$gallery->id)}}"
                                                    class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                    title="Delete">
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
