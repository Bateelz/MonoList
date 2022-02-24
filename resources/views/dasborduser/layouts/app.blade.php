<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MonoList</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="MonoList" name="description" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/monolist_icon.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{  URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{  URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{  URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

@yield('body')
@yield('content')

<!-- JAVASCRIPT -->
<script src="{{  URL::asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{  URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{  URL::asset('assets/libs/metismenu/metismenu.min.js') }}"></script>
<script src="{{  URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{  URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>


@yield('script')
<!-- App js -->
<script src="{{  URL::asset('assets/js/app.min.js') }}"></script>

</body>

</html>
