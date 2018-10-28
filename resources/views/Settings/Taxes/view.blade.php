@extends('layouts.template')

@section('title')
    Taxes 
@endsection

@section('head')
    <!-- Datatale CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>

    <link href="{{asset('dist/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('dist/vendors/bower_components/datetimepicker/jquery.datetimepicker.css')}}"/>
    <style type="text/css">
        .flatamount{
            display: none;
        }
        .flatpercentage{
            display: none;
        }
        .slabno{
            display: none;
        }
        .slabs{
            display: none;
        }
        .pax{
            display: none;
        }

        .edit,.delete{
            visibility: hidden;
        }
        @permission('taxes.edit')
        .edit{
            visibility: visible;
        }
        @endpermission
        @permission('taxes.destroy')
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
                <h5 class="txt-dark">Taxes </h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="#"><span>Settings</span></a></li>
                    <li class="active"><a href="/taxes/create"><span>Taxes </span></a></li>
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
                            <h6 class="panel-title txt-dark">Taxes </h6>
                        </div>
                        <button type="button" id="add" class="btn btn-orange btn-sm btn-anim pull-right" data-toggle="modal" data-target="#addmodal">Add</button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                @include('Settings.Taxes._form')
                                <div class="table-responsive">
                                    <table id="datable_1" class="dynamic-table table table-hover display pb-30"  style="table-layout:fixed;width: 96% !important;">
                                        <thead>
                                        <tr>
                                            <th>Tax Name</th>
                                            <th>Posting Type</th>
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
    <script src="{{asset('dist/vendors/bower_components/datetimepicker/build/jquery.datetimepicker.full.js')}}" type="text/javascript"></script>
    <script>

        jQuery('.datepicker').datetimepicker({format: 'd-m-Y',timepicker:false});
        
        $(document).ready(function (e) {



            mytable = $('.dynamic-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('/taxes/getDataTable') }}",
                columns: [
                    {data: "tax_name"},
                    {data: "posting_type"},
                    {data: "edit"},
                    {data: "delete"}
                ]
            });

             $(document).on('click', '.edit', function () {

                 $(".edit_slabs").html('');
                var id = $(this).data("id");
                var short_name = $(this).data("short-name");
                var tax_name = $(this).data("tax-name");
                var applies_from = $(this).data("applies-from");
                var exempt_after = $(this).data("exempt-after");
                var posting_type = $(this).data("posting-type");
                var flat_amount = $(this).data("flat-amount");
                var flat_percentage = $(this).data("flat-percentage");
                var no_of_slab = $(this).data("no-of-slab");
                var apply_pax = $(this).data("apply-pax");
                var apply_tax = $(this).data("apply-tax");
                var is_on_rackrate = $(this).data("is-on-rackrate");

                $('#editform #tax_id').val(id);
                $('#editform #short_name').val(short_name);
                $('#editform #tax_name').val(tax_name);
                $('#editform #applies_from').val(applies_from);
                $('#editform #exempt_after').val(exempt_after);
                $('#editform #posting_type').val(posting_type);
                $('#editform #flat_amount').val(flat_amount);
                $('#editform #flat_percentage').val(flat_percentage);
                $('#editform #apply_pax').val(apply_pax);

                if(apply_tax=="Before"){
                     $('#editform #before').prop('checked', true);
                }
                if(apply_tax=="After"){
                     $('#editform #after').prop('checked', true);
                }
                if(is_on_rackrate==1){
                    $('#editform #is_on_rackrate').prop('checked', true);
                }

                $('#editform').attr('action', '/taxes/' + id);
                $('#editmodal').modal('show');

                 getTaxes(posting_type,id);
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
                                    url: "/taxes/" + id,
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

        $(document).on("change",".postingtype",function(){
            var pval=$(this).val();
            
            if($(this).val()=="Amount"){
                $(".flatamount").css("display","block");
                $(".pax").css("display","block");
                $(".flatpercentage").css("display","none");   
                $(".slabno").css("display","none");
                $(".slabs").css("display","none");   
            }
            else if($(this).val()=="Percentage"){
                $(".flatamount").css("display","none");
                $(".pax").css("display","none");
                $(".flatpercentage").css("display","block");   
                $(".slabno").css("display","none");
                $(".slabs").css("display","none");   
            }
            else if($(this).val()=="Slab"){
                $(".slabno").css("display","block");   
                $(".pax").css("display","none");
                $(".flatamount").css("display","none");
                $(".flatpercentage").css("display","none"); 
                $(".slabs").css("display","none");     
            }
            else
            {
                $(".slabno").css("display","none");   
                $(".pax").css("display","none");
                $(".flatamount").css("display","none");
                $(".flatpercentage").css("display","none"); 
                $(".slabs").css("display","none");        
            }
        });

        $(document).on("click",".generate",function(e){
            var nos=$("#no_slab").val();
            if(nos>10){
                alert("Only 10 Slabs allowed");
            }
            else{
                $(".slabs").css("display","block");
                $("#txt_slabs").html("");
                for(i=1;i<=nos;i++){
                    $("#txt_slabs").append("<div class='col-md-4'><input type='text' class='form-control' name='from[]' id='from"+i+"' /></div><div class='col-md-4'><input type='text' class='form-control' name='to[]' id='to"+i+"' /></div><div class='col-md-4'><input type='text' class='form-control' name='percentage[]' id='percentage"+i+"' /></div>");
                }
            }

        });

        $(document).on("change","#editform .postingtype",function(){
            var type=$(this).val();
            var tax_id = $("#editform #tax_id").val();
            getTaxes(type,tax_id);
        });

        function getTaxes(type, tax_id)
        {
            if(type=="Amount")
            {
                $.ajax(
                    {
                        url: "/taxes/getTaxSlab/",
                        type: 'POST',
                        data: {
                            "tax_id": tax_id,
                            "type": "Amount",
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (result) {
                            $(".edit_slabs").html('');
                            $(".flatamount").css("display","block");
                            $(".pax").css("display","block");
                            $(".flatpercentage").css("display","none");
                            $("#editform #flatamount").val(result.flat_amount);
                        },
                        error: function (request, status, error) {
                            var val = request.responseText;
                            console.log(val);
                            alert("error" + val);
                        }
                    });
            }
            else if(type=="Percentage")
            {
                $.ajax(
                    {
                        url: "/taxes/getTaxSlab/",
                        type: 'POST',
                        data: {
                            "tax_id": tax_id,
                            "type": "Percentage",
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (result) {
                            $(".edit_slabs").html('');
                            $(".flatamount").css("display","none");
                            $(".pax").css("display","none");
                            $(".flatpercentage").css("display","block");
                            $("#editform #flatpercentage").val(result.flat_percentage);
                        },
                        error: function (request, status, error) {
                            var val = request.responseText;
                            console.log(val);
                            alert("error" + val);
                        }
                    });
            }
            else if(type=="Slab")
            {
                $.ajax(
                    {
                        url: "/taxes/getTaxSlab/",
                        type: 'POST',
                        data: {
                            "tax_id": tax_id,
                            "type": "Slab",
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (result) {
                            $(".flatamount").css("display","none");
                            $(".pax").css("display","none");
                            $(".flatpercentage").css("display","none");
                            var i=0;
                            $(".edit_slabs").html('<div class="row" style="margin-bottom:10px;text-align:center;">\n' +
                                '                                    <label class="col-md-4" style="font-weight:bolder">FROM</label>\n' +
                                '                                    <label class="col-md-4" style="font-weight:bolder">To</label>\n' +
                                '                                    <label class="col-md-4" style="font-weight:bolder">%</label>\n' +
                                '                                </div>');
                            result.forEach(function(entry) {
                                i++;
                                $(".edit_slabs").append("<div class='col-md-4'><input type='text' class='form-control' name='from[]' id='from"+i+"' value='"+entry.from+"' /></div><div class='col-md-4'><input type='text' class='form-control' name='to[]' id='to"+i+"'  value='"+entry.to+"'  /></div><div class='col-md-4'><input type='text' class='form-control' name='percentage[]' id='percentage"+i+"'  value='"+entry.percentage+"'  /></div>");
                            });
                        },
                        error: function (request, status, error) {
                            var val = request.responseText;
                            console.log(val);
                            alert("error" + val);
                        }
                    });
            }
        }
    </script>
@stop