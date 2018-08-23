<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content=""/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- include.head -->
    @yield('head')
    @include('include.head')

</head>

<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!-- /Preloader -->
<div class="wrapper theme-2-active navbar-top-light horizontal-nav">
    <!-- Top Menu Items -->
    @include('include.top_menu')
    <!-- /Top Menu Items -->

    <!-- Right Setting Menu -->
    @include('include.right_setting_menu')
    <!-- /Right Setting Menu -->

    <!-- Main Content -->
    <div class="page-wrapper" >
        @yield('content')

        <!-- Footer -->
        @include('include.footer')
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->
<!-- JavaScript -->
@include('include.script')

@yield('js_script')


</body>
</html>
