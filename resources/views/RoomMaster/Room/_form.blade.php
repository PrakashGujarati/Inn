<div class="form-group">
        {{ Form::label("Room Type",null,['class'=>"control-label mb-10 col-sm-2","for"=>"roomtype_id"]) }}
    <div class="col-sm-10">
        {{Form::select('roomtype_id', $roomtype, null, ['class' => 'form-control','id' =>'roomtype_id','placeholder' => 'Select Room Type']) }}
    </div>
</div>
<div class="form-group">
        {{ Form::label("room_no",null,['class'=>"control-label mb-10 col-sm-2","for"=>"room_no"]) }}
    <div class="col-sm-10">
        {{Form::text('room_no',null, ['class' => 'form-control','id' =>'status','placeholder' => 'Enter Room No']) }}
    </div>
    @if ($errors->has('room_no'))
        <span class="help-block">
        <strong>{{ $errors->first('room_no') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
        {{ Form::label("Room Capacity",null,['class'=>"control-label mb-10 col-sm-2","for"=>"room capacity"]) }}
    <div class="col-sm-10">
        {{Form::number('capacity',null, ['class' => 'form-control','id' =>'capacity','placeholder' => 'Enter Room Capacity']) }}
    </div>
    @if ($errors->has('capacity'))
        <span class="help-block">
        <strong>{{ $errors->first('capacity') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label("ExtNo.",null,['class'=>"control-label mb-10 col-sm-2","for"=>"ext_no"]) }}
    <div class="col-sm-10">
        {{Form::text('ext_no',null, ['class' => 'form-control','id' =>'ext_no','placeholder' => 'Enter ExtNo.']) }}
    </div>
    @if ($errors->has('ext_no'))
        <span class="help-block">
        <strong>{{ $errors->first('ext_no') }}</strong>
        </span>
    @endif
</div>