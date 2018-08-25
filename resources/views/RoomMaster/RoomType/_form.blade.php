<div class="form-group mr-25">
    <label class="control-label mr-10 name_inline" for="name_inline">Name</label>
    {{ Form::text('name',null, ['class' => 'form-control','id' =>'name','placeholder' => 'Enter Name']) }}
</div>
<div class="form-group mr-25">
    <label class="control-label mr-10 short_name_inline" for="short_name_inline">Short Name</label>
    {{Form::text('short_name',null, ['class' => 'form-control','id' =>'short_name','placeholder' => 'Enter Short Name']) }}
</div>