@extends('layouts.template')

@section('title')
    Room Status
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
                <h5 class="txt-dark">Room Status</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="#"><span>Room Master</span></a></li>
                    <li class="active"><a href="/roomstatus/create"><span>Room Status</span></a></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>

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
                                {!! Form::open(["method"=>"post","url" =>"roomstatus", "id" => "roomstatus", "class" => "form-inline","files" => "true"]) !!}
                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                @include('RoomMaster.RoomStatus._form')

                                {{ Form::button('Add', ['type' => 'button', 'id' => 'add', 'class' => 'btn btn-orange  btn-anim pull-right'] )  }}
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
                                            <th>Status</th>
                                            <th>Color</th>
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
                    "url": "/roomstatus",
                    "dataSrc": function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                                'status': json[i].status,
                                'color': json[i].color,
                                'action': '<a class="btn btn-primary" href="/roomstatus/'+json[i].id+'/edit">Edit</a>',
                            })
                        }
                        return return_data;
                    }
                },
                "columns": [
                    { "data": "status" },
                    { "data": "color" },
                    { "data": "action","width": "30px" }
                ],
                "order": [[ 0, "asc" ]]
            });

            $("#add").click(function () {
                var status = $("#status").val();
                var color = $("#color").val();
                var token = $("#token").val();

                $.ajax(
                    {
                        url: "/roomstatus",
                        type: 'POST',
                        data: {
                            "status": status,
                            "color": color,
                            "_token": token
                        },
                        success: function (result) {
                            table.ajax.reload();
                            $("#status").val("");
                            $("#color").val("");
                        },
                        error: function (request, status, error) {
                            var data = request.responseText;
                            alert(data);
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