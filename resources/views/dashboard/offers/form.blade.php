<div class="form-group row">

    <label class="col-md-2 control-label">الاسم بالعربية</label>
    <div class="col-md-4">
        {!! Form::text('ar_name',null,[
                       'class' =>'form-control '.($errors->has('ar_name') ? ' is-invalid' : null),
                       'placeholder'=> 'الاسم بالعربية' ,
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
                       'placeholder'=> 'الاسم بالانجليزية' ,
                       ]) !!}
        @error('en_name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 control-label">الصورة </label>
    <div class="col-sm-4">
        {!! Form::file('image',['class' =>'form-control '.($errors->has('image') ? ' is-invalid' : null) ]) !!}
        @error('image')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">نسبة الخصم </label>
    <div class="col-md-4">
        {!! Form::number('discount', null,[
                         'class' =>'form-control '.($errors->has('discount') ? ' is-invalid' : null),
                         'placeholder'=> 'نسبة الخصم' ,'min'=>'1','max'=>'99'
                         ]) !!}
        @error('discount')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">الخدمات </label>
    <div class="col-md-4">
        {!! Form::select('services[]',$services,isset($offer) ? $offer->offerServices : null,['class' =>'form-control js-example-basic-multiple select2'.($errors->has('services') ? ' is-invalid' : null)
                                            ,'multiple' ]) !!}
        @error('services')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">تاريخ بداية العرض </label>
    <div class="col-md-4">
        {!! Form::date('start_date', isset($offer) ?  $offer->start_date : null,[
                         'class' =>'form-control '.($errors->has('start_date') ? ' is-invalid' : null),
                         'placeholder'=> 'تاريخ بداية العرض ' ,
                         ]) !!}
        @error('start_date')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    <label class="col-md-2 control-label">تاريخ نهاية العرض </label>
    <div class="col-md-4">
        {!! Form::date('end_date', isset($offer) ?  $offer->end_date : null,[
                         'class' =>'form-control '.($errors->has('end_date') ? ' is-invalid' : null),
                         'placeholder'=> 'تاريخ نهاية العرض ' ,
                         ]) !!}
        @error('end_date')
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
