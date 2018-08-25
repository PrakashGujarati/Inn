<div class="form-group mr-25">
    <label class="control-label mr-10 roomtype_id_inline" for="roomtype_inline">Room Type </label>
    {{Form::select('roomtype_id', $roomtype, null, ['class' => 'form-control','id' =>'roomtype_id','placeholder' => 'Select Room Type']) }}
</div>
<div class="form-group mr-25">
    <label class="control-label mr-10 room_no_inline" for="room_no_inline">Room No </label>
    {{Form::text('room_no',null, ['class' => 'form-control','id' =>'room_no','placeholder' => 'Enter Room No.','style'=>'width: 100px;']) }}
</div>

<div class="form-group mr-25">
    <label class="control-label mr-10 capacity_inline" for="capacity_inline">Room Capacity </label>
    {{ Form::text('capacity',null, ['class' => 'form-control','id' =>'capacity','placeholder' => 'Enter Capacity','style'=>'width: 100px;']) }}
</div>

<div class="form-group mr-25">
    <label class="control-label mr-10 extension_no_inline" for="extension_no_inline">Extension No </label>
    {{Form::text('extension_no',null, ['class' => 'form-control','id' =>'extension_no','placeholder' => 'Enter Extension No.']) }}
</div>