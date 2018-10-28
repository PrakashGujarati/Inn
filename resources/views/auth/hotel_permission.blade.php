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
                        <form action="/hotel_permissions" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="role">Select hotel:</label>
                            <select class="form-control" id="hotel" name="hotel_id[]">
                                @foreach($hotels as $hotel)
                                <option>{{$hotel->hotelcode}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="checkbox">
                            @foreach($routes as $route)
                                <label style="margin: 0px 10px 0px 10px;width: 230px;"><input type="checkbox" name="route[]" value="{{$route}}" > {{$route}}</label>
                            @endforeach
                        </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @elseif($formtype=="edit")
                            {!! Form::model($hotels, ['method' => 'PATCH','route' => ['hotel_permissions.update', $hotels]]) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="hotel">Select hotel:</label>
                                <select class="form-control" id="hotel" name="hotel_id[]">
                                        <option>{{$hotels}}</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                @foreach($routes as $value)
                                    <label style="margin: 0px 10px 0px 10px;width: 200px;">
                                            {{ Form::checkbox('route[]', $value, in_array($value, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                        {{ $value }}
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
