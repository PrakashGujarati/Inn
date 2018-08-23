<div class="form-group">
    {{ Form::label("Status",null,['class'=>"control-label mb-10 col-sm-2","for"=>"status"]) }}
    <div class="col-sm-10">
        {{Form::text('status',null, ['class' => 'form-control','id' =>'status','placeholder' => 'Enter Status']) }}
    </div>
    @if ($errors->has('status'))
        <span class="help-block">
        <strong>{{ $errors->first('status') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label("Color",null,['class'=>"control-label mb-10 col-sm-2","for"=>"color"]) }}
    <div class="col-sm-10">
        {{Form::text('color',null, ['class' => 'form-control','id' =>'color','placeholder' => 'Enter Color']) }}
    </div>
    @if ($errors->has('color'))
        <span class="help-block">
        <strong>{{ $errors->first('color') }}</strong>
        </span>
    @endif
</div>