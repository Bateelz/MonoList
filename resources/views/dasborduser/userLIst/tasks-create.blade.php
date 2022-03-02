@extends('dasborduser.layouts.app')
@section('content')
    <body class="auth-body-bg">
        <body style="background-color: #fafafa !important">

            @include('sweet::alert')

                <div class="container">
                    <div class="d-flex col-l-6 justify-content-center">
                        <div class="auth-full-page-content p-md-5 p-4"
                            style="background-color: #ffffff !important;margin: 2%; border:solid 1px #dbdbdb; border-radius:8px;box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;">
                            <div class="w-100 ">
                                <div class="d-flex flex-column h-100 ">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index" class="d-block auth-logo">
                                            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18"
                                                class="auth-logo-dark">
                                            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18"
                                                class="auth-logo-light">
                                        </a>
                                    </div>
                                    <!-- <h5 class="text-danger" style="color:#e30000">Login</h5> -->
                                    <div class="mt-4">
                                    <div class="avatar-md mx-auto">
            <div class="avatar-title rounded-circle bg-light">
                <i class="bx bxs-envelope h1 mb-0 text-danger"></i>
            </div>
        </div>
        <div class="p-2 mt-4 text-center ">
            <h4>Verify your email</h4>
            <p>Please check your email for link <br>to verify your email address <span
                    class="fw-semibold"><br>admin@admin.com</span> Please check it</p>
                    <div class="mt-3 d-grid">
                                                <button class="btn btn-danger waves-effect waves-light" style="background-color:#e30000"
                                                    type="submit">Resend</button>
                                            </div>
           
        </div>
                                        <div class="mt-5 text-center">
                                            <!-- <p>Didn't receive an email? <a href="{{ url('register') }}"
                                                    class="fw-medium text-danger" style="color:#e30000"> Resend </a>
                                            </p> -->
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
