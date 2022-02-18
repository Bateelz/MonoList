
@section('title')
    @lang('translation.Recover_Password') 2
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
@endsection


@section('content')
    <body class="auth-body-bg">
        <body style="background-color: #fafafa !important">
          

                <div class="container">
                    <div class="d-flex col-l-6 justify-content-center">
                        <div class="auth-full-page-content p-md-5 p-4"
                            style="background-color: #ffffff !important;margin: 2%; border:solid 1px #dbdbdb; border-radius:8px;box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;">
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
                                    <h5 class="text-danger">Login</h5>
                                    <div class="mt-4">
                                        <form class="form-horizontal" method="post" >
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input name="email"type="hidden"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}"
                                                    placeholder="Enter Email"  autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="password"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}"
                                                    placeholder="New Password"  autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="password"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}"
                                                    placeholder="Confirm Password"  autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>
                                    
                                           

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-danger waves-effect waves-light"
                                                    type="submit">Reset</button>
                                            </div>
                                           
                                        </form>
                                        <div class="mt-5 text-center">
                                             <p>You Remember It ? <a href="{{ url('login') }}" class="font-weight-medium text-primary"> Sign In here</a> </p> 
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
