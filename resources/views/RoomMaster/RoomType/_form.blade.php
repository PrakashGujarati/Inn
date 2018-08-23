<div class="form-group">
    {{ Form::label("Name",null,['class'=>"control-label mb-10 col-sm-2","for"=>"Name"]) }}
    <div class="col-sm-10">
        {{Form::text('name',null, ['class' => 'form-control','id' =>'name','placeholder' => 'Enter Name']) }}
    </div>
    @if ($errors->has('name'))
        <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {{ Form::label("Short Name",null,['class'=>"control-label mb-10 col-sm-2","for"=>"shortname"]) }}
    <div class="col-sm-10">
        {{Form::text('short_name',null, ['class' => 'form-control','id' =>'short_name','placeholder' => 'Enter Short Name']) }}
    </div>
    @if ($errors->has('short_name'))
        <span class="help-block">
        <strong>{{ $errors->first('short_name') }}</strong>
        </span>
    @endif
</div>