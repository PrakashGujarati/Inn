@extends('layouts.template')

@section('title')
    Room Tariff
@endsection

@section('head')
    <!-- Data table CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dist/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container" style="min-height: 550px;margin-top:20px;">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Tariff</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="#"><span>Room Master</span></a></li>
                    <li class="active"><a href="/tariffs/create"><span>Tariff</span></a></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Room Tariff</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                {!! Form::model($tariffs,['method'=>'post','action' =>  ['TariffController@update', $tariffs->id], 'id' => 'tariffs', 'class' => 'form-inline',"files" => "true"]) !!}
                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                                @include('RoomMaster.Tariff._form')

                                <a class="btn btn-orange  btn-anim pull-right ml-5" href="/tariffs/create">Add</a>
                                {{ Form::button('Edit', ['type' => 'button', 'id' => 'add', 'class' => 'btn btn-orange  btn-anim pull-right'] )  }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_1" class="table table-hover display  pb-30" >
                                        <thead>
                                        <tr>
                                            <th>Room No</th>
                                            <th>Tariff</th>
                                            <th>Extra Bed Tariff</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script')

    <!-- Data table JavaScript -->
    <script src="{{asset('dist/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function (e) {
            var table = $('#datable_1').DataTable({
                "ajax": {
                    "url": "/tariffs",
                    "dataSrc": function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                                'room_id': json[i].room_id,
                                'tariff': json[i].tariff,
                                'extra_bed_tariff': json[i].extra_bed_tariff,
                                'action': '<a class="btn btn-primary" href="/tariffs/'+json[i].id+'/edit">Edit</a>',
                            })
                        }
                        return return_data;
                    }
                },
                "columns": [
                    { "data": "room_id" },
                    { "data": "tariff" },
                    { "data": "extra_bed_tariff" },
                    { "data": "action","width": "30px" }
                ],
                "order": [[ 0, "asc" ]]
            });

            $("#add").click(function () {
                var room_id = $("#room_id").val();
                var tariff = $("#tariff").val();
                var extra_bed_tariff = $("#extra_bed_tariff").val();
                var token = $("#token").val();
                var action = $("#tariffs").attr('action');

                $.ajax(
                    {
                        url: action,
                        type: 'POST',
                        data: {
                            "room_id": room_id,
                            "tariff": tariff,
                            "extra_bed_tariff": extra_bed_tariff,
                            "_method": 'PUT',
                            "_token": token
                        },
                        success: function (result) {
                            table.ajax.reload();
                            $("#room_id").val("");
                            $("#tariff").val("");
                            $("#extra_bed_tariff").val("");
                        },
                        error: function (request, status, error) {
                            var data = request.responseText;
                            $.each(request.responseJSON.errors, function (key, value) {
                                $('.'+key+'_inline').html('*'+key);
                                $('.'+key+'_inline').css('color','red');
                            });
                        }
                    });
            });
        });
    </script>
@stop