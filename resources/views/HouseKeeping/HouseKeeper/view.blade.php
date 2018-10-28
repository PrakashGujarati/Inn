@extends('layouts.template')

@section('title')
    House Keepers
@endsection

@section('head')
    <!-- Datatale CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>

    <link href="{{asset('dist/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <style>
        .edit,.delete{
            visibility: hidden;
        }
        @permission('housekeepers.edit')
        .edit{
            visibility: visible;
        }
        @endpermission
        @permission('housekeepers.destroy')
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
                <h5 class="txt-dark">House Keepers </h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="#"><span>HouseKeeping</span></a></li>
                    <li class="active"><a href="/housekeepers/create"><span>House Keepers </span></a></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>

        <!-- Row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">House Keepers </h6>
                        </div>
                        <button type="button" id="add" class="btn btn-orange btn-sm btn-anim pull-right" data-toggle="modal" data-target="#addmodal">Add</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                @include('HouseKeeping.HouseKeeper._form')
                                <div class="table-responsive">
                                    <table id="datable_1" class="dynamic-table table table-hover display pb-30"  style="table-layout:fixed;width: 96% !important;">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th width="50px;">Edit</th>
                                            <th width="50px;">Delete</th>
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
    <script src="{{asset('dist/js/validation/jquery.validate.min.js')}}" type="text/javascript"></script>

    <script>

        
        $(document).ready(function (e) {
            mytable = $('.dynamic-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/housekeepers/getDataTable') }}",
                columns: [
                    {data: "name"},
                    {data: "mobile_no"},
                    {data: "edit"},
                    {data: "delete"}
                ]
            });

             $(document).on('click', '.edit', function () {

                var id = $(this).data("id");
                var name = $(this).data("name");
                var mobile_no = $(this).data("mobile_no");
                var user_name = $(this).data("user_name");
                var password = $(this).data("password");

                $('#editform #name').val(name);
                $('#editform #mobile_no').val(mobile_no);
                $('#editform #user_name').val(user_name);
                $('#editform #password').val(password);
                $('#editform').attr('action', '/housekeepers/' + id);
                $('#editmodal').modal('show');
            });

             /* EDIT Record using AJAX Requres */
            var editaddformValidator = $("#editform").validate({
                ignore: ":hidden",
                errorElement: "span",
                errorClass: "text-danger",
                validClass: "text-success",
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass(errorClass);
                    $(element.form).find("span[id=" + element.id + "-error]").addClass(errorClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass(errorClass);
                    $(element.form).find("span[id=" + element.id + "-error]").removeClass(errorClass);
                },
                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: $(form).serialize(),
                        success: function (data) {
                            $('#editmodal').modal('hide');
                            swal("Good job!", "Your Record Updated Successfully", "success");
                            $(form).trigger('reset');
                            mytable.draw();
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            var response = JSON.parse(XMLHttpRequest.responseText);
                            editaddformValidator.showErrors(response.errors);
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });


            var mytable;
                /* DELETE Record using AJAX Requres */
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
                    }, function(isConfirm){
                        if (isConfirm) {
                            $.ajax(
                                {
                                    url: "/housekeepers/" + id,
                                    type: 'POST',
                                    data: {
                                        "id": id,
                                        "_method": 'DELETE',
                                        "_token": token
                                    },
                                    success: function (result) {
                                        swal("Deleted!", "Your Record is deleted.", "success");
                                        mytable.draw();
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


            /* ADD Record using AJAX Requres */
            var addformValidator = $("#addform").validate({
                ignore: ":hidden",
                errorElement: "span",
                errorClass: "text-danger",
                validClass: "text-success",
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass(errorClass);
                    $(element.form).find("span[id=" + element.id + "-error]").addClass(errorClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass(errorClass);
                    $(element.form).find("span[id=" + element.id + "-error]").removeClass(errorClass);
                },
                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: $(form).serialize(),
                        success: function (data) {
                            $('#addmodal').modal('hide');
                            swal("Good job!", "Your Record Inserted Successfully", "success");
                            $(form).trigger('reset');
                            mytable.draw();
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            var response = JSON.parse(XMLHttpRequest.responseText);
                            addformValidator.showErrors(response.errors);
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });
            /* EDIT Record using AJAX Requres */
        });

    </script>
@stop