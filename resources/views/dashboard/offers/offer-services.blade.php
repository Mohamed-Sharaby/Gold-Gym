<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item{{$model->id}}">تفاصيل الخدمات
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item{{$model->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>

            </div>
            <div class="modal-body">
                <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>اسم الخدمة</th>
                        <th>التفاصيل</th>
                        <th>الشروط</th>
                        <th>السعر</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($model->offerServices as $index => $service)
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>{{$service->name}}</td>
                            <td>{!! $service->en_description !!}</td>
                            <td> {!! $service->ar_terms !!}</td>
                            <td>{{$service->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
