@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Permissions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if($formtype=="insert")
                        <form action="/permissions" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="role">Select Role:</label>
                            <select class="form-control" id="role" name="role_id[]">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="checkbox">
                            @foreach($permissions as $permission)
                                <label style="margin: 0px 10px 0px 10px;width: 230px;"><input type="checkbox" name="permission_id[]" value="{{$permission->id}}" />
                                    {{str_replace('App\Http\\Controllers\\','',$permission->name)}}</label>
                            @endforeach
                        </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @elseif($formtype=="edit")
                            {!! Form::model($role, ['method' => 'PATCH','route' => ['permissions.update', $role->id]]) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="role">Select Role:</label>
                                <select class="form-control" id="role" name="role_id[]">
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                @foreach($permissions as $value)
                                    <label style="margin: 0px 10px 0px 10px;width: 230px;">
                                        {{ Form::checkbox('permission_id[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ str_replace('App\Http\\Controllers\\','',$value->name) }}
                                    </label>
                                @endforeach
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            {!! Form::close() !!}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_script')
    <!-- jQuery -->
    <script src="{{ asset('dist/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script>
        /* RETRIVE DATA For Editing Purpose */
        $(document).on('change', '#role', function () {
            var id = $(this).val();
            window.location.replace("/permissions/"+id+"/edit");
        });
    </script>
@stop
