<div class="form-group mr-25">
    <label class="control-label mr-10 room_id_inline" for="room_id">Room No </label>
    {{Form::select('room_id', $room, null, ['class' => 'form-control','id' =>'room_id','placeholder' => 'Select Room No.']) }}
</div>
<div class="form-group mr-25">
    <label class="control-label mr-10 tariff_inline" for="tariff">Tariff </label>
    {{Form::text('tariff',null, ['class' => 'form-control','id' =>'tariff','placeholder' => 'Enter Tariff']) }}
</div>
<div class="form-group mr-25">
    <label class="control-label mr-10 extra_bed_tariff_inline" for="extra_bed_tariff">Extra Bed Tariff </label>
    {{ Form::text('extra_bed_tariff',null, ['class' => 'form-control','id' =>'extra_bed_tariff','placeholder' => 'Enter Extra Bed Tariff']) }}
 </div>