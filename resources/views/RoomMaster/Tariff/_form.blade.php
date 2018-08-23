<div class="form-group">
    {{ Form::label("Room No.",null,['class'=>"control-label mb-10 col-sm-2","for"=>"room_id"]) }}
    <div class="col-sm-10">
        {{Form::select('room_id', $room, null, ['class' => 'form-control','id' =>'room_id','placeholder' => 'Select Room']) }}
    </div>
</div>
<div class="form-group">
        {{ Form::label("No of Persons",null,['class'=>"control-label mb-10 col-sm-2","for"=>"noofpersons"]) }}
    <div class="col-sm-10">
        {{Form::number('noofpersons',null, ['class' => 'form-control','id' =>'noofpersons','placeholder' => 'Enter No of Persons']) }}
    </div>
    @if ($errors->has('noofpersons'))
        <span class="help-block">
        <strong>{{ $errors->first('noofpersons') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
        {{ Form::label("Tariff",null,['class'=>"control-label mb-10 col-sm-2","for"=>"Tariff"]) }}
    <div class="col-sm-10">
        {{Form::number('tariff',null, ['class' => 'form-control','id' =>'tariff','placeholder' => 'Enter Tariff']) }}
    </div>
    @if ($errors->has('tariff'))
        <span class="help-block">
        <strong>{{ $errors->first('tariff') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label("Extra Bad",null,['class'=>"control-label mb-10 col-sm-2","for"=>"Extra Bad"]) }}
    <div class="col-sm-10">
        {{Form::text('extra_bad',null, ['class' => 'form-control','id' =>'extra_bad','placeholder' => 'Enter Extra Bad']) }}
    </div>
    @if ($errors->has('extra_bad'))
        <span class="help-block">
        <strong>{{ $errors->first('extra_bad') }}</strong>
        </span>
    @endif
</div>