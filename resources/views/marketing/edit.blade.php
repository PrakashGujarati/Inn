 @extends('layouts.template')

@section('title')
          Update Marketing Detail
@endsection


@section('content')
<div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Update Marketing Detail</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="/mrketings/{{ $marketing->id }}/edit">Update Marketing</a>
                </li>

              </ol>
            </div>
          </div>
        </div>

      </div>
  <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card" >
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Update Marketing</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                   {!! Form::model($marketing,['method'=>'post','action' =>  ['MarketingController@update',$marketing->id],'class' => 'form',"files" => "true"]) !!}

                   {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PATCH">
                   @include('marketing._form')

                      <div class="form-actions">
                         <button type="submit" class="btn btn-warning mr-1" ><i class="ft-plus"></i> Update</button>

                        {{ Form::button('<i class="ft-x"></i> Cancel', ['type' => 'reset', 'class' => 'btn btn-primary'] )  }}
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
        </div>
    <!-- // Basic form layout section end -->
      </div>
    </div>
	</div>

 @endsection
