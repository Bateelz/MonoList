@extends('dasborduser.layouts.app')
@section('content')
    <body class="auth-body-bg">
        <body style="background-color: #fafafa !important">
          

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
                                    <h5 class="text-danger">Login</h5>
                                    <div class="mt-4">
                                        <form class="form-horizontal" method="post" action="{{ route('login') }}">
                                            @csrf
                                            <div class=" input-group mb-3">
                                                <input name="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}"
                                                    placeholder="Enter Email" autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>
                                            <div class="input-group mb-3">

                                                <div
                                                    class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                    <input type="password" name="password"
                                                        class="form-control  @error('password') is-invalid @enderror"
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
                                            <div class="form-check">

                                                <input class="form-check-input bg-danger" type="checkbox" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember"> Remember me </label>
                                                <br><br>


                                            </div>
                                            <a href="" class="text-muted">Forgot password?</a> 
                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-danger waves-effect waves-light"
                                                    type="submit">LogIn</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <h5 class="font-size-14 mb-3">Sign in with</h5>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                      <a href="{{ url('social/auth/facebook') }}" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-facebook"></i>
                                                      </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a href="{{ url('social/auth/apple') }}" class="social-list-item bg-info text-white border-info">
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
                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="{{ url('register') }}"
                                                    class="fw-medium text-danger"> Signup now </a>
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
