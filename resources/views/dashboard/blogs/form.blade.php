<div class="form-group row">
    <label class="col-md-2 control-label"> النوع  </label>

    <div class="col-sm-10">
        {!! Form::select('type',['news'=>'خبر','health'=>'صحة'],null,['class' =>'form-control '.($errors->has('type') ? ' is-invalid' : null)
, 'placeholder'=>  'النوع' ]) !!}
        @error('type')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 control-label">العنوان بالعربية</label>
    <div class="col-md-4">
        {!! Form::text('ar_title',null,[
                        'class' =>'form-control '.($errors->has('ar_title') ? ' is-invalid' : null),
                        'placeholder'=> 'العنوان بالعربية' ,
                        ]) !!}
        @error('ar_title')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">العنوان بالانجليزية</label>
    <div class="col-md-4">
        {!! Form::text('en_title',null,[
                       'class' =>'form-control '.($errors->has('en_title') ? ' is-invalid' : null),
                       'placeholder'=> 'العنوان بالانجليزية' ,
                       ]) !!}
        @error('en_title')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">التفاصيل بالعربية </label>
    <div class="col-md-10">
        {!! Form::textarea('ar_body',null,['cols'=> '30','rows'=>3,
           'class' =>'form-control ck-editor'.($errors->has('ar_body') ? ' is-invalid' : null),
           'placeholder'=> 'الوصف بالعربية  ' ,
           ]) !!}
        @error('ar_body')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">التفاصيل بالانجليزية </label>
    <div class="col-md-10">
        {!! Form::textarea('en_body',null,['cols'=> '30','rows'=>3,
'class' =>'form-control ck-editor'.($errors->has('en_body') ? ' is-invalid' : null),
'placeholder'=> 'الوصف بالانجليزية ' ,
]) !!}
        @error('en_body')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-sm-2 control-label">الصورة الرئيسية </label>
    <div class="col-sm-4">
        {!! Form::file('image',[ 'class' =>'form-control '.($errors->has('image') ? ' is-invalid' : null) ]) !!}
        @error('image')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    @isset($blog)
        @if($blog->image)
            <a data-fancybox="gallery" href="{{getImgPath($blog->image)}}">
                <img src="{{getImgPath($blog->image)}}" width="100" height="100"
                     class="img-thumbnail">
            </a>
        @else لا يوجد صورة @endif
    @endisset


</div>
<div class="form-group row">
    <label class="col-sm-2 control-label">صور اضافية </label>
    <div class="col-sm-4">
        {!! Form::file('photos[]',['class' =>'form-control '.($errors->has('photos') ? ' is-invalid' : null),'multiple'=>true ]) !!}
        @error('photos')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
        تم حذف الصورة بنجاح
    </p>
    @isset($blog)
        @if(count($blog->getMedia('photos')) > 0)
            @foreach($blog->getMedia('photos') as $photo)
                <div class="row photo{{$photo->id}}">
                    <div class="col-md-6 text-right">
                        <a data-fancybox="gallery" href="{{$photo->getUrl()}}">
                            <img src="{{$photo->getUrl()}}" width="100" height="100"
                                 class="img-thumbnail">
                        </a>
                    </div>
                    <div class="col-md-6 text-left">
                        <a class="btn btn-icon btn-danger del_photo btn-sm"
                           data-id="{{$photo->id}}">
                            <i class="fa fa-trash text-white"></i></a>
                    </div>
                </div>
            @endforeach
        @else لا يوجد صور @endif
    @endisset
</div>

<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
        حفظ
    </button>
</div>
