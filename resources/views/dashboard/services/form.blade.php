<div class="form-group row">
    <label class="col-md-2 control-label">الاسم بالعربية</label>
    <div class="col-md-4">
        {!! Form::text('ar_name',null,[
                         'class' =>'form-control '.($errors->has('ar_name') ? ' is-invalid' : null),
                         'placeholder'=> 'العنوان بالعربية' ,
                         ]) !!}
        @error('ar_name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">الاسم بالانجليزية</label>
    <div class="col-md-4">
        {!! Form::text('en_name',null,[
                       'class' =>'form-control '.($errors->has('en_name') ? ' is-invalid' : null),
                       'placeholder'=> 'العنوان بالانجليزية' ,
                       ]) !!}
        @error('en_name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الوصف بالعربية </label>
    <div class="col-md-10">
        {!! Form::textarea('ar_description',null,['cols'=> '30','rows'=>3,
            'class' =>'form-control ck-editor'.($errors->has('ar_description') ? ' is-invalid' : null),
            'placeholder'=> 'الوصف بالعربية  ' ,
            ]) !!}
        @error('ar_description')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    </div>
<div class="form-group row">
    <label class="col-md-2 control-label">الوصف بالانجليزية </label>
    <div class="col-md-10">
        {!! Form::textarea('en_description',null,['cols'=> '30','rows'=>3,
             'class' =>'form-control ck-editor'.($errors->has('en_description') ? ' is-invalid' : null),
             'placeholder'=> 'الوصف بالعربية  ' ,
             ]) !!}
        @error('en_description')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">الشروط بالعربية </label>
    <div class="col-md-10">
        {!! Form::textarea('ar_terms',null,['cols'=> '30','rows'=>3,
            'class' =>'form-control ck-editor'.($errors->has('ar_terms') ? ' is-invalid' : null),
            'placeholder'=> 'الشروط بالعربية  ' ,
            ]) !!}
        @error('ar_terms')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    </div>
<div class="form-group row">
    <label class="col-md-2 control-label">الشروط بالانجليزية </label>
    <div class="col-md-10">
        {!! Form::textarea('en_terms',null,['cols'=> '30','rows'=>3,
             'class' =>'form-control ck-editor'.($errors->has('en_terms') ? ' is-invalid' : null),
             'placeholder'=> 'الشروط بالعربية  ' ,
             ]) !!}
        @error('en_terms')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 control-label">السعر  </label>
    <div class="col-md-4">
        {!! Form::number('price',null,[
                         'class' =>'form-control '.($errors->has('price') ? ' is-invalid' : null),
                         'placeholder'=> 'السعر  ' ,'max'=>'99999'
                         ]) !!}
        @error('price')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 control-label">الصورة </label>
    <div class="col-sm-4">
        {!! Form::file('image',[ 'class' =>'form-control '.($errors->has('image') ? ' is-invalid' : null) ]) !!}
        @error('image')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    @isset($service)
        @if($service->image)
            <a data-fancybox="gallery" href="{{$service->image}}">
                <img src="{{$service->image}}" width="100" height="100"
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
    @isset($service)
        @if(count($service->getMedia('photos')) > 0)
            @foreach($service->getMedia('photos') as $photo)
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
        @else لا يوجد صور اضافيه @endif
    @endisset
</div>

<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
        حفظ
    </button>
</div>
