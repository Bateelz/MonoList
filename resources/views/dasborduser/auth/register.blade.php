@extends('dasborduser.layouts.master-without-nav')
@section('title') @lang('translation.Register')  @endsection
 @section('body')


  @endsection
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

                <h5 class="text-danger text-center" style="color:#e30000">Register account</h5>

              <div class="mt-4">
                <form method="POST" class="form-horizontal" action="{{ route('Registration') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="input-group mb-3">
                    <input type="text" class="form-control " value="{{ old('first_name') }}" id="firstname" name="first_name" autofocus required placeholder="Firstname">
                    @error('firstname') <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span> @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control " value="{{ old('last_name') }}" id="lastname" name="last_name" autofocus required placeholder="Lastname"> @error('firstname') <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span> @enderror
                  </div>
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Email" autofocus required>
                     @error('email') <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span> @enderror
                  </div>
                  <div class="input-group mb-3">

                                                <div
                                                    class="input-group auth-pass-inputgroup ">
                                                    <input type="password" name="password"
                                                        class="form-control"
                                                         placeholder="Enter password"
                                                        aria-label="Password" aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon">
                                                        <i class="mdi mdi-eye-outline"></i>
                                                    </button> @error('password') <span class="invalid-feedback"
                                                            role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span> @enderror
                                                </div>
                                            </div>
                  <div class="mt-3 d-grid">
                    <button class="btn btn-danger waves-effect waves-light" style="background-color:#e30000" type="submit">Register</button>
                  </div>
                  <div class="mt-4 text-center">
                    <h5 class="font-size-14 mb-3">Sign up using</h5>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="{{ url('social/auth/facebook') }}" class="social-list-item bg-primary text-white border-primary">
                          <i class="mdi mdi-facebook"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="social-list-item bg-dark text-white border-dark">
                          <i class="mdi mdi-apple"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="{{ url('social/auth/google') }}" class="social-list-item bg-danger text-white border-danger">
                          <i class="mdi mdi-google"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="mt-3 text-center">
                    <p>Already have an account ? <a href="{{ url('/') }}" class="fw-medium text-danger" style="color:#e30000"> Login</a>
                    </p>
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

