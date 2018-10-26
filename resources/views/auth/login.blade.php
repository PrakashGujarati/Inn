<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content=""/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="{{ asset('dist/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->

<div class="wrapper  pa-0">
    <header class="sp-header">
        <div class="clearfix"></div>
    </header>

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0 auth-page">
        <div class="container">
            <!-- Row -->
            <div class="table-struct full-width full-height">
                <div class="table-cell vertical-align-middle auth-form-wrap">
                    <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="mb-30">
                                    <h3 class="text-center txt-dark mb-10">Sign in to Hotel PMS</h3>
                                    <!--<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>-->
                                </div>
                                <div class="form-wrap">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label class="control-label mb-10" >Username</label>
                                            <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Enter Username"  required autofocus style="box-shadow:0 2px 5px 0 rgba(0, 0, 0, 0.4), 0 5px 15px 0 rgba(0, 0, 0, 0.19);border:1px solid #000;">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label class="pull-left control-label mb-10">Password</label>
                                            <div class="clearfix"></div>

                                            <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" style="box-shadow:0 2px 5px 0 rgba(0, 0, 0, 0.4), 0 5px 15px 0 rgba(0, 0, 0, 0.19);border:1px solid #000;" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-10" >Hotel Code</label>
                                            <input type="text" class="form-control" required="true" id="hotelcode" name="hotelcode" placeholder="Enter Hotel Code" style="box-shadow:0 2px 5px 0 rgba(0, 0, 0, 0.4), 0 5px 15px 0 rgba(0, 0, 0, 0.19);border:1px solid #000;">
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-orange btn-rounded" style="width:100%;margin-top:20px;">Log In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->
        </div>

    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->

<!-- jQuery -->
<script src="dist/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('dist/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>
</body>

</html>
