@extends('layouts.template')

@section('title')
    Room Types
@endsection


@section('head')
    <!-- Data Table CSS -->
    <link href="{{asset('dist/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container" style="min-height: 550px;margin-top:20px;">
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark" style="margin-top: 3px;">View - Room Types</h6>
                        </div>
                        <a class="btn btn-primary btn-sm pull-right" href="/roomtypes/create">Add</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="datable_1" class="table table-hover display  pb-30" >
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Short Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $c=0; ?>
                                        @foreach ($roomtypes as $rt)
                                        <tr>
                                            <td>{{$c+1}}</td>
                                            <td>{{$rt->name}}</td>
                                            <td>{{$rt->short_name}}</td>
                                            <td><a class="btn btn-primary fa fa-edit"  href="roomtypes/{{ $rt->id }}/edit" ></a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
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
        $(document).ready(function() {
             $('#datable_1').DataTable();
        });
    </script>
@stop