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
    <div class="col-md-4">
        {!! Form::textarea('ar_description',null,['cols'=> '30','rows'=>3,
            'class' =>'form-control '.($errors->has('ar_description') ? ' is-invalid' : null),
            'placeholder'=> 'الوصف بالعربية  ' ,
            ]) !!}
        @error('ar_description')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">الوصف بالانجليزية </label>
    <div class="col-md-4">
        {!! Form::textarea('en_description',null,['cols'=> '30','rows'=>3,
             'class' =>'form-control '.($errors->has('en_description') ? ' is-invalid' : null),
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
    <label class="col-sm-2 control-label">النوع </label>
    <div class="col-sm-4">
        {!! Form::select('type',['video'=>'فيديو','image'=>'صورة'],null,['class' =>'form-control '.($errors->has('type') ? ' is-invalid' : null)
, 'placeholder'=>  'النوع' ]) !!}
        @error('type')
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
    @isset($gallery)
        @if($gallery->image)
            <a data-fancybox="gallery" href="{{getImgPath($gallery->image)}}">
                <img src="{{getImgPath($gallery->image)}}" width="100" height="100"
                     class="img-thumbnail">
            </a>
        @else لا يوجد صورة @endif
    @endisset

</div>
<div class="form-group row">
    <label class="col-sm-2 control-label">رابط الفيديو </label>
    <div class="col-sm-4">
        {!! Form::url('video_link',null,[
                       'class' =>'form-control '.($errors->has('video_link') ? ' is-invalid' : null),
                       'placeholder'=> 'رابط الفيديو  ' ,
                       ]) !!}
        @error('video_link')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
        حفظ
    </button>
</div>
