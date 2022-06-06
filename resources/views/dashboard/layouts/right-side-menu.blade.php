<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{asset('admin/assets/images/user.jpg')}}" alt="user-img" title="{{auth('admin')->user()->name}}"
                     class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="javascript:void(0)">{{auth('admin')->user()->name}}</a></h5>
            <ul class="list-inline">
                <li>
                    <a href="{{route('admin.admins.edit',auth()->id())}}" title="اعدادات الحساب">
                        <i class="zmdi zmdi-settings zmdi-hc-2x text-primary"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}" class="text-custom" title="تسجيل الخروج"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power zmdi-hc-2x text-danger"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('admin.main')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
                        <span> الرئيسية </span> </a>
                </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="fa fa-life-ring"></i> <span>صفحة البداية </span> <span class="menu-arrow"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('admin.landing-sliders.index')}}">السلايدر</a></li>
                            <li><a href="{{route('admin.landing-services.index')}}"> خدماتنا</a></li>
                            <li><a href="{{route('admin.landing-works.index')}}">اعمالنا</a></li>
                            <li><a href="{{route('admin.clients.index')}}">أراء العملاء</a></li>
                            <li><a href="{{route('admin.landing-settings.index')}}">اعدادات صفحة البداية  </a></li>
                        </ul>
                    </li>


                @can('Roles')
                    <li>
                        <a href="{{route('admin.roles.index')}}" class="waves-effect"><i
                                class="fa fa-balance-scale"></i> <span> الصلاحيات والمناصب </span> </a>
                    </li>
                @endcan

                @can('Admins')
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-life-ring"></i> <span> الادارة </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('admin.admins.index')}}"> المديرين</a></li>
                            <li><a href="{{route('admin.activity-logs.index')}}">سجل عمليات المديرين</a></li>
                        </ul>
                    </li>
                @endcan

                @can('Users')
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> العملاء </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('admin.users.index')}}"> العملاء</a></li>
                            <li><a href="{{route('admin.notifications.create')}}"> اشعارات العملاء</a></li>

                        </ul>
                    </li>
                @endcan

                @can('Blogs')
                    <li>
                        <a href="{{route('admin.blogs.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-blogger"></i> <span> الاخبار  </span> </a>
                    </li>
                @endcan

                @can('Galleries')
                    <li>
                        <a href="{{route('admin.galleries.index')}}" class="waves-effect"><i
                                class="fa fa-file-image-o"></i> <span> مكتبة الصور والفيديوهات  </span> </a>
                    </li>
                @endcan

                @can('Banners')
                    <li>
                        <a href="{{route('admin.banners.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-collection-folder-image"></i> <span> البانرات  </span> </a>
                    </li>
                @endcan


                @can('Services')
                    <li>
                        <a href="{{route('admin.services.index')}}" class="waves-effect"><i
                                class="fa fa-align-left"></i> <span> الخدمات</span> </a>
                    </li>
                @endcan

                @can('Offers')
                    <li>
                        <a href="{{route('admin.offers.index')}}" class="waves-effect"><i
                                class="fa fa-opencart"></i> <span> العروض</span> </a>
                    </li>
                @endcan

                @can('Coupons')
                    <li>
                        <a href="{{route('admin.coupons.index')}}" class="waves-effect"><i
                                class="fa fa-percent"></i> <span> كوبونات الخصم</span> </a>
                    </li>
                @endcan

                @can('Orders')
                    <li>
                        <a href="{{route('admin.orders.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-shopping-cart-plus"></i> <span> الطلبات</span> </a>
                    </li>
                @endcan

                @can('Contacts')
                    <li>
                        <a href="{{route('admin.contacts.index')}}" class="waves-effect"><i
                                class="fa fa-envelope-open"></i> <span> رسائل الزوار  </span> </a>
                    </li>
                @endcan

                @can('Chats')
                    <li>
                        <a href="{{route('admin.chats.index')}}" class="waves-effect"><i
                                class="fa fa-envelope-open"></i> <span> محادثات الدعم الفني  </span> </a>
                    </li>
                @endcan


                @can('Settings')
                    <li>
                        <a href="{{route('admin.settings.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-settings"></i> <span> الاعدادات </span> </a>
                    </li>
                @endcan


            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
