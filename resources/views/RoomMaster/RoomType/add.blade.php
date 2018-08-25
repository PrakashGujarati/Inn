@extends('layouts.template')

@section('title')
    Room Types
@endsection


@section('head')
    <!-- Data table CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dist/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container" style="min-height: 550px;">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Room Types</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="#"><span>Room Master</span></a></li>
                    <li class="active"><a href="/roomtypes/create"><span>Room Types</span></a></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">
                                    {!! Form::open(["method"=>"post","url" =>"roomtypes", "id" => "roomtype", "class" => "form-inline","files" => "true"]) !!}
                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                    @include('RoomMaster.RoomType._form')

                                    {{ Form::button('Add', ['type' => 'button', 'id' => 'add', 'class' => 'btn btn-orange  btn-anim pull-right'] )  }}
                                    {!! Form::close() !!}
                                </div>
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
                                            <th>Name</th>
                                            <th>Short Name</th>
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
        <!-- /Row -->
    </div>
@endsection

@section('js_script')

    <!-- Data table JavaScript -->
    <script src="{{asset('dist/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>


    <script>
        $(document).ready(function (e) {
            var table = $('#datable_1').DataTable({
                "ajax": {
                    "url": "/roomtypes",
                    "dataSrc": function (json) {
                        var return_data = new Array();
                        for(var i=0;i< json.length; i++){
                            return_data.push({
                                'name': json[i].name,
                                'short_name': json[i].short_name,
                                'action': '<a class="btn btn-primary" href="/roomtypes/'+json[i].id+'/edit">Edit</a>',
                            })
                        }
                        return return_data;
                    }
                },
                "columns": [
                    { "data": "name" },
                    { "data": "short_name" },
                    { "data": "action","width": "30px" }
                ],
                "order": [[ 0, "asc" ]]
            });

            $("#add").click(function () {
                var name = $("#name").val();
                var short_name = $("#short_name").val();
                var token = $("#token").val();

                $.ajax(
                    {
                        url: "/roomtypes",
                        type: 'POST',
                        data: {
                            "name": name,
                            "short_name": short_name,
                            "_token": token
                        },
                        success: function (result) {
                            table.ajax.reload();
                            $("#name").val("");
                            $("#short_name").val("");
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