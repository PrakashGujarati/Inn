<div class="row">
    <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label mr-10 name_inline" for="name_wrap">Room Type</label>
                {{ Form::text('name',null, ['class' => 'form-control','id' =>'name','placeholder' => 'Enter Room Type']) }}
            </div>
    </div>
    <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label mr-10 short_name_inline" for="short_name_inline">Short Name</label>
                {{Form::text('short_name',null, ['class' => 'form-control','id' =>'short_name','placeholder' => 'Enter Short Name']) }}
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Single Bed (AC)</label>
            {{Form::text('person_one',null, ['class' => 'form-control','id' =>'person_one','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Double Bed (AC)</label>
            {{Form::text('person_two',null, ['class' => 'form-control','id' =>'person_two','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Three Bed (AC)</label>
            {{Form::text('person_three',null, ['class' => 'form-control','id' =>'person_three','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Four Bed (AC)</label>
            {{Form::text('person_four',null, ['class' => 'form-control','id' =>'person_four','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Five Bed (AC)</label>
            {{Form::text('person_five',null, ['class' => 'form-control','id' =>'person_five','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Extra Person (AC)</label>
            {{Form::text('extra_person',null, ['class' => 'form-control','id' =>'extra_person','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Single Bed (Non-AC)</label>
            {{Form::text('person_one_nac',null, ['class' => 'form-control','id' =>'person_one_nac','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Double Bed (Non-AC)</label>
            {{Form::text('person_two_nac',null, ['class' => 'form-control','id' =>'person_two_nac','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Three Bed (Non-AC)</label>
            {{Form::text('person_three_nac',null, ['class' => 'form-control','id' =>'person_three_nac','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Four Bed (Non-AC)</label>
            {{Form::text('person_four_nac',null, ['class' => 'form-control','id' =>'person_four_nac','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Five Bed (Non-AC)</label>
            {{Form::text('person_five_nac',null, ['class' => 'form-control','id' =>'person_five_nac','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
    <div class="col-md-2 col-sm-12">
        <div class="form-group">
            <label class="control-label mr-10 short_name_inline" for="short_name_inline">Extra Person (Non-AC)</label>
            {{Form::text('extra_person_nac',null, ['class' => 'form-control','id' =>'extra_person_nac','placeholder' => 'Enter Amount']) }}
        </div>
    </div>
</div>