<div class="form-group row">
    <label class="col-md-2 control-label">اليوم </label>
    <div class="col-md-4">
        {!! Form::date('day', isset($appointment) ?  $appointment->day : null,[
                         'class' =>'form-control '.($errors->has('day') ? ' is-invalid' : null),
                         'placeholder'=> 'تاريخ اليوم' ,
                         ]) !!}
        @error('day')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group row">
        <label class="col-sm-2 control-label">حالة اليوم </label>
        <div class="col-sm-4">
            {!! Form::select('day_status',day_status(),null,['class' =>'form-control '.($errors->has('day_status') ? ' is-invalid' : null)  ]) !!}
            @error('day_status')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <input type="hidden" name="service_id" value="{{isset($service) ? $service->id : $appointment->service->id}}">
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">الساعة من </label>
    <div class="col-md-4">
{{--        {!! Form::time('from', isset($appointment) ?  $appointment->from : null,[--}}
{{--                         'class' =>'form-control '.($errors->has('from') ? ' is-invalid' : null),--}}
{{--                         'placeholder'=> 'الساعة من' ,--}}
{{--                         ]) !!}--}}

        <div class="input-group m-b-15">
            <div class="bootstrap-timepicker">
                <input id="timepicker" type="text" class="form-control {{$errors->has('from') ? ' is-invalid' : null}}" readonly name="from"
                       value="{{isset($appointment) ?  $appointment->from->format('h:i A'):''}}">
            </div>
            <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
        </div>

        @error('from')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">الساعة الى  </label>
    <div class="col-md-4">
{{--        {!! Form::time('to', isset($appointment) ?  $appointment->to : null,[--}}
{{--                         'class' =>'form-control '.($errors->has('to') ? ' is-invalid' : null),--}}
{{--                         'placeholder'=> 'الساعة الى ' ,--}}
{{--                         ]) !!}--}}
        <div class="input-group m-b-15">
            <div class="bootstrap-timepicker">
                <input id="timepicker2" type="text" class="form-control {{$errors->has('to') ? ' is-invalid' : null}}" readonly name="to"
                value="{{isset($appointment) ?   $appointment->to->format('h:i A') : ''}}">
            </div>
            <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
        </div>
        @error('to')
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
