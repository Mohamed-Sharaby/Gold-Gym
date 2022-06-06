<div class="portlet fadeIn">
    <div class="portlet-heading bg-purple">
        <h3 class="portlet-title">
            تفاصيل طلب الحجز رقم / {{$order->id}}
        </h3>
        <div class="portlet-widgets">
            <a href="javascript:;" data-toggle="reload"><i
                    class="zmdi zmdi-refresh"></i></a>
            <a data-toggle="collapse" data-parent="#accordion1" href="#details"><i
                    class="zmdi zmdi-minus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="details" class="panel-collapse collapse in">
        <div class="portlet-body">

            <table class="table table-bordered table-responsive table-striped">

                <tr>
                    <th> العميل</th>
                    <td>  @include('dashboard.orders.user_details') </td>
                </tr>

                <tr>
                    <th>اسم الخدمة</th>
                    <td>   @include('dashboard.orders.service_details') </td>
                </tr>
                <tr>
                    <th>عدد الافراد </th>
                    <td>  {{$order->no_of_persons}} </td>
                </tr>

                <tr>
                    <th>اجمالى تكلفة الخدمة</th>
                    <td>  {{ $order->price * $order->no_of_persons}} </td>
                </tr>

                <tr>
                    <th>تاريخ انشاء الطلب</th>
                    <td> {{$order->created_at->format('Y-m-d')}}</td>
                </tr>

                <tr>
                    <th>الحالة</th>
                    <td>  {{__($order->status)}} </td>
                </tr>

                @if($order->finished_at)
                <tr>
                    <th>تاريخ انتهاء الطلب</th>
                    <td>  {{$order->finished_at->toDateString()}} </td>
                </tr>
                @endif

                <tr>
                    <th>كوبون الخصم</th>
                    <td>
                        @if($order->coupon)
                            الكود :  {{$order->coupon->code}} -   النسبة :  {{$order->coupon->value}}  : المبلغ المخصوم -  {{($order->price*$order->no_of_persons) * $order->coupon->value / 100}}
                        @else
                            لا يوجد
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>الضريبة  </th>
                    <td>  {{$order->tax}} </td>
                </tr>

                <tr>
                    <th>اجمالى قيمة طلب الحجز</th>
                    <td>
                        {{ number_format($order->total,2) }}
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>

