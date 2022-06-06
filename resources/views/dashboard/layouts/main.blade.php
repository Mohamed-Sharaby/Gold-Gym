@extends('dashboard.layouts.layout')
@section('title','بلو جولد جيم - لوحة التحكم')

@section('content')
    <div class="row" style="margin-top: 10px!important;">

        @can('Roles')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.roles.index')}}">
                    <div class="card-box bg-info">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الصلاحيات والمناصب</h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-balance-scale fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\Spatie\Permission\Models\Role::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

        @can('Admins')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.admins.index')}}">
                    <div class="card-box bg-success">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الادارة </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-life-ring fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Admin::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan


        @can('Users')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.users.index')}}">
                    <div class="card-box bg-danger">
                        <h4 class="header-title m-t-0 m-b-30 text-white">العملاء </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-users fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\User::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

{{--        @can('Services')--}}
{{--            <div class="col-lg-3 col-md-6">--}}
{{--                <a href="{{route('admin.services.index')}}">--}}
{{--                    <div class="card-box bg-warning">--}}
{{--                        <h4 class="header-title m-t-0 m-b-30 text-white">الخدمات </h4>--}}
{{--                        <div class="widget-chart-1">--}}
{{--                            <div class="widget-chart-box-1">--}}
{{--                                <i class="zmdi zmdi-apps zmdi-hc-4x text-white"></i>--}}
{{--                            </div>--}}
{{--                            <div class="widget-detail-1">--}}
{{--                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Service::count()}} </h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div><!-- end col -->--}}
{{--        @endcan--}}

            @can('Banners')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.banners.index')}}">
                    <div class="card-box bg-info">
                        <h4 class="header-title m-t-0 m-b-30 text-white">البانرات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="zmdi zmdi-collection-folder-image zmdi-hc-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Banner::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

        @can('Services')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.services.index')}}">
                    <div class="card-box bg-primary">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الخدمات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-align-left fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Service::whereIsOffer(0)->count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

        @can('Blogs')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.blogs.index')}}">
                    <div class="card-box bg-pink">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الاخبار   </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="zmdi zmdi-blogger zmdi-hc-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Blog::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

            @can('Galleries')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.galleries.index')}}">
                    <div class="card-box bg-pink">
                        <h4 class="header-title m-t-0 m-b-30 text-white">مكتبة الصور والفيديوهات   </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-file-image-o fa-4x text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Gallery::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan


        @can('Orders')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.orders.index')}}">
                    <div class="card-box bg-purple">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الطلبات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="zmdi zmdi-shopping-cart-plus zmdi-hc-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Order::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

            @can('Offers')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.offers.index')}}">
                    <div class="card-box bg-purple">
                        <h4 class="header-title m-t-0 m-b-30 text-white">العروض </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-opencart fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Service::whereIsOffer(1)->count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

            @can('Coupons')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.coupons.index')}}">
                    <div class="card-box bg-purple">
                        <h4 class="header-title m-t-0 m-b-30 text-white">كوبونات الخصم </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-percent fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Coupon::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

        @can('Contacts')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.contacts.index')}}">
                    <div class="card-box bg-danger">
                        <h4 class="header-title m-t-0 m-b-30 text-white">رسائل الزوار </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="fa fa-envelope-open fa-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Contact::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan

            @can('Settings')
            <div class="col-lg-3 col-md-6">
                <a href="{{route('admin.settings.index')}}">
                    <div class="card-box bg-inverse">
                        <h4 class="header-title m-t-0 m-b-30 text-white">الاعدادات </h4>
                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1">
                                <i class="zmdi zmdi-settings zmdi-hc-4x  text-white"></i>
                            </div>
                            <div class="widget-detail-1">
                                <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Setting::count()}} </h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        @endcan




    </div>
    <!-- end row -->


@endsection
