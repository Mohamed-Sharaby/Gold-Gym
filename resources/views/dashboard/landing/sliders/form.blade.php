<div class="form-group row">
    <label class="col-md-2 control-label">الاسم </label>
    <div class="col-md-10">
        {!! Form::text('title',null,[
                             'class' =>'form-control '.($errors->has('title') ? ' is-invalid' : null),
                             'placeholder'=> 'الاسم ' ,
                             ]) !!}
        @error('title')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="form-group row">
    <label class="col-md-2 control-label">التفاصيل </label>
    <div class="col-md-10">
        {!! Form::textarea('body',null,['rows'=>3,
                             'class' =>'form-control '.($errors->has('body') ? ' is-invalid' : null),
                             'placeholder'=> 'التفاصيل ' ,
                             ]) !!}
        @error('body')
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
    @isset($slider)
        @if($slider->image)
            <a data-fancybox="gallery" href="{{$slider->image}}">
                <img src="{{$slider->image}}" width="100" height="100"
                     class="img-thumbnail">
            </a>
        @else لا يوجد صورة @endif
    @endisset
</div>

<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md">
        حفظ
    </button>
</div>
