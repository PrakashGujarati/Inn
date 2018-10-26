@extends('layouts.template')

@section('title')
    Room Tariff
@endsection

@section('head')
    <!-- Data table CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('dist/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <style>
        .edit,.delete{
            visibility: hidden;
        }
        @permission('tariffs.edit')
        .edit{
            visibility: visible;
        }
        @endpermission
        @permission('tariffs.destroy')
        .delete{
            visibility: visible;
        }
        @endpermission
    </style>
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
                                {!! Form::model($tariffs,['method'=>'post','action' =>  ['TariffController@update',$tariffs->id], 'id' => 'tariffs', 'class' => 'form-wrap',"files" => "true"]) !!}
                                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                                @include('RoomMaster.Tariff._form')

                                <a class="btn btn-orange  btn-anim pull-right ml-5" href="/tariffs/create">Add</a>
                                {{ Form::button('Edit', ['type' => 'button', 'id' => 'add', 'class' => 'btn btn-orange  btn-anim pull-right'] )  }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr style="border-top: 3px solid #4267b2;">
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_1" class="table table-hover display  pb-30"
                                           style="table-layout:fixed;width: 98% !important;">
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

            $.ajax({
                url: "/roomtype/tariffs?id="+{{$id}},
                type: 'get',
                success: function(result){
                    $("#person_one_tariff").val(result.person_one);
                    $("#person_two_tariff").val(result.person_two);
                    $("#person_three_tariff").val(result.person_three);
                    $("#person_four_tariff").val(result.person_four);
                    $("#person_five_tariff").val(result.person_five);
                    $("#extra_person_tariff").val(result.extra_person);
                    $("#person_one_nac_tariff").val(result.person_one_nac);
                    $("#person_two_nac_tariff").val(result.person_two_nac);
                    $("#person_three_nac_tariff").val(result.person_three_nac);
                    $("#person_four_nac_tariff").val(result.person_four_nac);
                    $("#person_five_nac_tariff").val(result.person_five_nac);
                    $("#extra_person_nac_tariff").val(result.extra_person_nac);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Ajax request failed: ' + xhr.responseText;
                    $('#content').html(errorMsg);
                }
            });

            var table = $('#datable_1').DataTable({
                "ajax": {
                    "url": "/tariffs",
                    "dataSrc": function (json) {
                        var return_data = new Array();
                        for (var i = 0; i < json.length; i++) {
                            return_data.push({
                                'room_no': json[i].room_no,
                                'roomtype_id': json[i].roomtype_id,
                                'capacity': json[i].capacity,
                                'action': '<a class="btn btn-sm btn-primary ti-pencil" style="padding:10px;margin-right:5px;" href="/tariffs/' + json[i].id + '/edit"></a>' +
                                    '<button type="button" class="delete btn btn-sm btn-danger ti-trash" style="padding:10px;" data-delete-id="' + json[i].id + '" data-token="' + '{!! csrf_token() !!}' + '" ></button>'
                            })
                        }
                        return return_data;
                    }
                },
                "columns": [
                    {"data": "room_no"},
                    {"data": "roomtype_id"},
                    {"data": "capacity"},
                    {"data": "action", "width": "80px"}
                ],
                "order": [[0, "asc"]]
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
                                $('.' + key + '_inline').html('*' + key);
                                $('.' + key + '_inline').css('color', 'red');
                            });
                        }
                    });
            });

            $(document).on('click', '.delete', function () {

                var id = $(this).data("delete-id");
                var token = $(this).data("token");


                swal({
                    title: "Are you sure?",
                    text: "Do you want to delete it perminantly !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f83f37",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax(
                            {
                                url: "/tariffs/" + id,
                                type: 'POST',
                                data: {
                                    "id": id,
                                    "_method": 'DELETE',
                                    "_token": token
                                },
                                success: function (result) {
                                    swal("Deleted!", "Your Record is deleted.", "success");
                                    table.ajax.reload();
                                },
                                error: function (request, status, error) {
                                    var val = request.responseText;
                                    console.log(val);
                                    alert("error" + val);
                                }
                            });
                    } else {
                        swal("Cancelled", "Your record is safe :)", "error");
                    }
                });
                return false;
            });

            /* Get Room Types Record using AJAX Requres */
            $(document).on('change', '#roomtype_id', function () {

                var id = $(this).val();
                var token = $(this).data("token");

                $.ajax(
                    {
                        url: "/roomtype/tariffs?id=" + id,
                        type: 'GET',
                        data: {
                            "id": id,
                            "_token": token
                        },
                        success: function (result) {
                            $("#person_one_tariff").val(result.person_one);
                            $("#person_two_tariff").val(result.person_two);
                            $("#person_three_tariff").val(result.person_three);
                            $("#person_four_tariff").val(result.person_four);
                            $("#person_five_tariff").val(result.person_five);
                            $("#extra_person_tariff").val(result.extra_person);
                            $("#person_one_nac_tariff").val(result.person_one_nac);
                            $("#person_two_nac_tariff").val(result.person_two_nac);
                            $("#person_three_nac_tariff").val(result.person_three_nac);
                            $("#person_four_nac_tariff").val(result.person_four_nac);
                            $("#person_five_nac_tariff").val(result.person_five_nac);
                            $("#extra_person_nac_tariff").val(result.extra_person_nac);
                        },
                        error: function (request, status, error) {
                            var val = request.responseText;
                            console.log(val);
                            alert("error" + val);
                        }
                    });
            });



        });
    </script>
@stop