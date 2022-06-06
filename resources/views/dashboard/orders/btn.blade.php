<td>
    <a href="{{route('admin.orders.show',$model->id)}}"
       class="btn-icon waves-effect btn btn-info btn-sm ">التفاصيل</a>
</td>

<td>
    <a href="{{route('admin.orders.edit',$model->id)}}"
       class="btn-icon waves-effect btn btn-primary btn-sm ">
        <i class="fa fa-edit"></i>
    </a>
</td>

<td>
    <button data-url="{{route('admin.orders.destroy',$model->id)}}"
            class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm   delete" title="حذف">
        <i class="fa fa-trash"></i>
    </button>
</td>
