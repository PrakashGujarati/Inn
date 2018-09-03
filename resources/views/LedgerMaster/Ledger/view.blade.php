@extends('layouts.template')

@section('title')
    Ledger 
@endsection

@section('head')
    <!-- Datatale CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>

    <link href="{{asset('dist/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>

@endsection

@section('content')
    <div class="container" style="min-height: 550px;margin-top:20px;">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Ledger </h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="#"><span>Ledger</span></a></li>
                    <li class="active"><a href="/ledgers/create"><span>Ledger </span></a></li>
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
                            <h6 class="panel-title txt-dark">Ledger </h6>
                        </div>
                        <button type="button" id="add" class="btn btn-orange btn-sm btn-anim pull-right" data-toggle="modal" data-target="#addmodal">Add</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                @include('LedgerMaster.Ledger._form')
                                <div class="table-responsive">
                                    <table id="datable_1" class="dynamic-table table table-hover display pb-30"  style="table-layout:fixed;width: 96% !important;">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Name</th>
                                            <th>Alias</th>
                                            <th>Group</th>
                                            <th>City</th>
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
                            url: "/ledgers/" + id,
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


        /* RETRIVE DATA For Editing Purpose */
        $(document).on('click', '.edit', function () {
            var id = $(this).data("id");
            var name = $(this).data("name");
            var alias = $(this).data("alias");
            var group_id = $(this).data("group-id");
            var city = $(this).data("city");
            var opening = $(this).data("opening");
            var connect_with = $(this).data("connect-with");
            var tally_name = $(this).data("tally-name");
            var dob = $(this).data("dob");
            var is_employee = $(this).data("is-employee");
            var address = $(this).data("address");
            var pincode = $(this).data("pincode");
            var phone_no = $(this).data("phone-no");
            var mobile_no = $(this).data("mobile-no");
            var email = $(this).data("email");
            var discount = $(this).data("discount");
            var native = $(this).data("native");
            var reference_name = $(this).data("reference-name");
            var state = $(this).data("state");
            var nationality = $(this).data("nationality");
            var gstn_no = $(this).data("gstn-no");

            $('#editform #name').val(name);
            $('#editform #alias').val(alias);
            $('#editform #group_id').val(group_id);
            $('#editform #city').val(city);
            $('#editform #opening').val(opening);
            $('#editform #connect_with').val(connect_with);
            $('#editform #tally_name').val(tally_name);
            $('#editform #dob').val(dob);
            $('#editform #address').val(address);
            $('#editform #pincode').val(pincode);
            $('#editform #phone_no').val(phone_no);
            $('#editform #mobile_no').val(mobile_no);
            $('#editform #email').val(email);
            $('#editform #discount').val(discount);
            $('#editform #native').val(native);
            $('#editform #reference_name').val(reference_name);
            $('#editform #state').val(state);
            $('#editform #nationality').val(nationality);
            $('#editform #gstn_no').val(gstn_no);

            if(is_employee)
                $("#editform #is_employee").prop('checked', true);
            else
                $("#editform #is_employee").prop('checked', false);

            $('#editform').attr('action', '/ledgers/' + id);
            $('#editmodal').modal('show');
        });

        $(document).ready(function (e) {
            mytable = $('.dynamic-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/ledgers/getDataTable') }}",
                columns: [
                    {data: "user.name"},
                    {data: "name"},
                    {data: "alias"},
                    {data: "group.name"},
                    {data: "city"},
                    {data: "edit"},
                    {data: "delete"}
                ]
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
        });

    </script>
@stop