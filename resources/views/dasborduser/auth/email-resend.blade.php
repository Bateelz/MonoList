@extends('dasborduser.layouts.app')
@section('title')
    @lang('translation.Recover_Password') 2
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
@endsection


@section('content')
    <body class="auth-body-bg">
        @include('sweet::alert')

        <body style="background-color: #fafafa !important">


                <div class="container">
                    <div class="d-flex col-l-6 justify-content-center">
                        <div class="auth-full-page-content p-md-5 p-4"
                            style="background-color: #ffffff !important;margin: 2%; border:solid 1px #dbdbdb; border-radius:8px;box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px; min-height: 75vh;">
                            <div class="w-100" style="webkit-box-sizing: border-box;">
                                <div class="d-flex flex-column">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index" class="d-block auth-logo">
                                            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18"
                                                class="auth-logo-dark">
                                            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18"
                                                class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="card-body">

<div class="p-2">
    <div class="text-center">

        <div class="avatar-md mx-auto">
            <div class="avatar-title rounded-circle bg-light">
                <i class="bx bxs-envelope h1 mb-0 text-danger"></i>
            </div>
        </div>
        <div class="p-2 mt-4">
            <h4>Verify your email</h4>
            <p>Please check your email for link to verify your email address <span
                    class="fw-semibold">admin@admin.com</span>, Please check it</p>
            <div class="mt-4">
                <a href="index" class="btn btn-success w-md" style="background-color:#e30000">Verify email</a>
               
            </div>
            <br>
                <p>Didn't receive an email? <a href="">Resend</a></p>
        </div>
    </div>
</div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                </div>
                <!-- end row -->
                </div>
                <br>
                <br>
                <nav class="navbar navbar-light bg-light">
                    <div class="container text-center">
                        <p>&copy; 2022 Monolist</p>
                    </div>
                </nav>
                <!-- end container-fluid -->
                </div>
            @endsection
