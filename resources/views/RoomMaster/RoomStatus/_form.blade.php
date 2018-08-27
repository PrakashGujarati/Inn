<div class="form-group mr-25">
    <label class="control-label mr-10 status_inline" for="Status_inline">Status </label>
    {{ Form::text('status',null, ['class' => 'form-control','id' =>'status','placeholder' => 'Enter Status']) }}
</div>
<div class="form-group mr-25">
    <label class="control-label mr-10 color_inline" for="Color_inline">Color </label>
    <div id="cp2" class="input-group colorpicker-component">
    {{Form::text('color',null, ['class' => 'form-control','id' =>'color','placeholder' => 'Enter Color']) }}
        <span class="input-group-addon"><i></i></span>
    </div>
</div>



