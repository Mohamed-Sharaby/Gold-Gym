<td >

    <a href="{{route('admin.services.show',$model->id)}}"
       class="btn-icon waves-effect btn btn-info btn-sm ml-2 rounded-circle">التفاصيل</a>


    <a href="{{route('admin.appointments.index',['service'=>$model->id])}}"
       class="btn-icon waves-effect btn btn-purple btn-sm ml-2 rounded-circle">
        مواعيد الحجز </a>


<form
    action="{{ route('admin.active', ['id' => $model->id, 'type' => 'Service']) }}"
    style="display: inline;"
    method="post">@csrf
    <button type="submit"
            class="btn-icon waves-effect {{ $model->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $model->is_active ? 'مفعل ' : ' معطل' }}</button>
</form>


<a href="{{route('admin.services.edit',$model->id)}}"
   class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
        class="fa fa-edit"></i></a>


<button data-url="{{route('admin.services.destroy',$model->id)}}"
        class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete"
        title="Delete">
    <i class="fa fa-trash"></i>
</button>


</td>
