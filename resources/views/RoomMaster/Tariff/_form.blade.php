<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        <label class="control-label mr-10 tariff_inline" for="tariff">Room No</label>
        {{Form::number('room_no',null, ['class' => 'form-control','id' =>'roomno','placeholder' => 'Enter Room Number']) }}
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <label class="control-label mr-10 roomtype_id_inline" for="roomtype_inline">Room Type </label>
        {{Form::select('roomtype_id', $roomtype, null, ['class' => 'form-control','id' =>'roomtype_id','placeholder' => '--Select Room Type--']) }}
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <label class="control-label mr-10 tariff_inline" for="tariff">Room Capacity</label>
        {{Form::text('capacity',null, ['class' => 'form-control','id' =>'room_capacity','placeholder' => 'Enter Room Capacity']) }}
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Single Bed (AC)</label>
            {{Form::text('person_one_tariff',null, ['class' => 'form-control','id' =>'person_one_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Double Bed (AC)</label>
            {{Form::text('person_two_tariff',null, ['class' => 'form-control','id' =>'person_two_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Three Bed (AC)</label>
            {{Form::text('person_three_tariff',null, ['class' => 'form-control','id' =>'person_three_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Four Bed (AC)</label>
            {{Form::text('person_four_tariff',null, ['class' => 'form-control','id' =>'person_four_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Five Bed (AC)</label>
            {{Form::text('person_five_tariff',null, ['class' => 'form-control','id' =>'person_five_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Extra Person (AC)</label>
            {{Form::text('extra_person_tariff',null, ['class' => 'form-control','id' =>'extra_person_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Single Bed (Non-AC)</label>
            {{Form::text('person_one_nac_tariff',null, ['class' => 'form-control','id' =>'person_one_nac_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Double Bed (Non-AC)</label>
            {{Form::text('person_two_nac_tariff',null, ['class' => 'form-control','id' =>'person_two_nac_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Three Bed (Non-AC)</label>
            {{Form::text('person_three_nac_tariff',null, ['class' => 'form-control','id' =>'person_three_nac_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Four Bed (Non-AC)</label>
            {{Form::text('person_four_nac_tariff',null, ['class' => 'form-control','id' =>'person_four_nac_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Five Bed (Non-AC)</label>
            {{Form::text('person_five_nac_tariff',null, ['class' => 'form-control','id' =>'person_five_nac_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Extra Person (Non-AC)</label>
            {{Form::text('extra_person_nac_tariff',null, ['class' => 'form-control','id' =>'extra_person_nac_tariff','placeholder' => 'Enter Amount','disabled'=>'disabled']) }}
        </div>
    </div>
</div>