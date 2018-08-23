@extends('layouts.template')

@section('title')
    Room Status
@endsection

@section('head')
    <!-- Jasny-bootstrap CSS -->
    <link href="{{asset('dist/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css')}}"
          rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container" style="min-height: 550px;margin-top:20px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Room Status</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                    {!! Form::open(["method"=>"post","url" =>"roomstatus","class" => "form-horizontal","files" => "true"]) !!}
                                    {{ csrf_field() }}
                                    @include('RoomMaster.RoomStatus._form')

                                    <div class="form-group mb-0">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            {{ Form::button('<i class="icon-rocket"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-orange btn-anim'] )  }}
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script')
    <script>
        /* $(document).ready(function() {
             alert('test');
         });*/
    </script>
@stop