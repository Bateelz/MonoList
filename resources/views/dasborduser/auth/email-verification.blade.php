@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Email_verification')
@endsection

@section('body')

    <body>
        @include('sweet::alert')
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5 text-muted">
                            <a href="index" class="d-block auth-logo">
                            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18"
                                                class="auth-logo-dark">
                                            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18"
                                                class="auth-logo-light">
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body">

                                <div class="p-2">
                                    <div class="text-center">

                                        <div class="avatar-md mx-auto">
                                            <div class="avatar-title rounded-circle bg-light">
                                                <i class="bx bxs-envelope h1 mb-0 text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="p-2 mt-4">
                                            <h4>Verify your email</h4>
                                            <p>We have sent you verification email <span
                                                    class="fw-semibold">admin@admin.com</span>, Please check it</p>
                                            <div class="mt-4">
                                                <a href="index" class="btn btn-success w-md">Verify email</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @endsection
