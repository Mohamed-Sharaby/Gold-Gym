<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#service{{$order->id}}">تفاصيل الخدمة
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="service{{$order->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                     تفاصيل الخدمة {{$order->service->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-bordered table-responsive table-striped">

                            <tr>
                                <th> الاسم بالعربية</th>
                                <td>  {{$order->service->ar_name}} </td>
                            </tr>
                            <tr>
                                <th> الاسم بالانجليزية</th>
                                <td>  {{$order->service->en_name}} </td>
                            </tr>

                            <tr>
                                <th>التفاصيل بالعربية</th>
                                <td>  {!! $order->service->ar_description !!} </td>
                            </tr>
                            <tr>
                                <th>التفاصيل بالانجليزية</th>
                                <td>  {!! $order->service->en_description !!} </td>
                            </tr>
                            <tr>
                                <th>الشروط بالعربية</th>
                                <td>  {!! $order->service->ar_terms !!} </td>
                            </tr>
                            <tr>
                                <th>الشروط بالانجليزية</th>
                                <td>  {!! $order->service->en_terms !!} </td>
                            </tr>

                            <tr>
                                <th>السعر</th>
                                <td>  {{$order->service->price}} </td>
                            </tr>

                            <tr>
                                <th>الصورة  </th>
                                <td>
                                    @if($order->service->image)
                                        <a data-fancybox="gallery" href="{{getImgPath($order->service->image)}}">
                                            <img src="{{getImgPath($order->service->image)}}" width="70" height="70"
                                                 class="img-thumbnail" alt="service_img">
                                        </a>
                                    @else {{__('No Image')}} @endif
                                </td>
                            </tr>
                            <tr>
                                <th>صور اضافية</th>
                                <td>
                                    <div class="row">
                                        @foreach($order->service->getMedia('photos') as $photo)
                                            <div class="col-md-4">
                                                <a data-fancybox="gallery" href="{{$photo->getUrl()}}">
                                                    <img src="{{$photo->getUrl()}}" width="100" height="100"
                                                         class="img-thumbnail">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
