<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item{{$order->id}}">تفاصيل العميل
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item{{$order->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                    تفاصيل العميل{{$order->user->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-bordered table-responsive table-striped">

                            <tr>
                                <th>   الاسم  </th>
                                <td>  {{$order->user->name}} </td>
                            </tr>
                            <tr>
                                <th> الجوال    </th>
                                <td>  {{$order->user->phone}} </td>
                            </tr>
                            <tr>
                                <th>البريد الالكترونى   </th>
                                <td>  {!! $order->user->email !!} </td>
                            </tr>
                            <tr>
                                <th>الصورة  </th>
                                <td>
                                    @if($order->user->image)
                                        <a data-fancybox="gallery" href="{{getImgPath($order->user->image)}}">
                                            <img src="{{getImgPath($order->user->image)}}" width="70" height="70"
                                                 class="img-thumbnail" alt="user_img">
                                        </a>
                                    @else {{__('No Image')}} @endif
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
