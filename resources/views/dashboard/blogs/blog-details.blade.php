<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item{{$blog->id}}">التفاصيل
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item{{$blog->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                    تفاصيل {{$blog->title}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-bordered table-responsive table-striped">

                            <tr>
                                <th> العنوان بالعربية  </th>
                                <td>  {{$blog->ar_title}} </td>
                            </tr>
                            <tr>
                                <th> العنوان بالانجليزية  </th>
                                <td>  {{$blog->en_title}} </td>
                            </tr>
                            <tr>
                                <th>التفاصيل بالعربية</th>
                                <td>  {!! $blog->ar_body !!} </td>
                            </tr>
                            <tr>
                                <th>التفاصيل بالانجليزية</th>
                                <td>  {!! $blog->en_body !!} </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
