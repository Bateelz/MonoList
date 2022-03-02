@extends('dasborduser.layouts.master')
@section('title') @lang('translation.Profile') @endsection

@section('content')
@include('sweet::alert')
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card overflow-hidden">
                <div class="bg-danger bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-danger p-3">
                                <h5 class="text-danger">Welcome {{ Auth::user()->user_name }} !</h5>

                            </div>
                        </div>
                        <div class="col-5 align-self-end">

                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ isset(Auth::user()->avatar) ? URL::asset(Auth::user()->avatar) : URL::asset('/assets/images/users/avatar-1.jpg') }}"
                                    alt="" class="img-thumbnail rounded-circle">
                                <br>
                            </div>

                        </div>

                        <div class="col-sm-8">

                            <div class="mt-4">
                                <h5>{{ Auth::user()->user_name }}</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Information</h4>

                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                            <tbody>
                                <tr>
                                    <th scope="row">UserName :</th>
                                    <td> <input type="text" class="form-control "
                                            value="{{ Auth::user()->user_name }}"  name="user_name"
                                            autofocus placeholder="Enter user name">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">FirstName :</th>
                                    <td> <input type="text" class="form-control"
                                            value="{{ Auth::user()->first_name }}"  name="first_name"
                                            autofocus placeholder="Enter first name">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">LastName :</th>
                                    <td> <input type="text" class="form-control"
                                            value="{{ Auth::user()->last_name }}" name="last_name"
                                            autofocus placeholder="Enter last name">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender :</th>
                                    <td><select class="form-control" id="gender"
                                            name="gender">
                                            <option value="{{ Auth::user()->gender }}">{{ Auth::user()->gender }}
                                            </option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select> </td>
                                </tr>
                                <tr>
                                    <th scope="row">Birthdate :</th>
                                    <td><input type="date" class="form-control"
                                            value="{{ Auth::user()->age }}" id="age" name="age" autofocus
                                            placeholder="Enter age"></td>


                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td> <input type="text" class="form-control "
                                            value="{{ Auth::user()->email }}" id="email" name="email" autofocus
                                            placeholder="Enter email">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number :</th>
                                    <td> <input type="text" class="form-control"
                                            value="{{ Auth::user()->phone_number }}" id="phone_number"
                                            name="phone_number" autofocus placeholder="Enter phone number">
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">Upload Image :</th>
                                    <td> <input type="file" class="form-control"
                                            value="{{ Auth::user()->avatar }}" id="avatar"
                                            name="avatar" autofocus>
                                    </td>
                                </tr>

                                <tr>

                                    <td>  <button class="btn btn-danger waves-effect waves-light UpdateProfile"
                                        style="position: absolute;right: 28px;margin-top: -9px;"
                                        data-id="{{ Auth::user()->id }}" type="submit">Update</button>
                                    </td>
                                </tr>

                                {{-- <div class="mt-3 d-grid">

                                </div> --}}
                            </tbody>

                        </form>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->

        </div>

        <!-- end row -->

        <!--  Update Profile example -->
        <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                            @csrf
                            <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                            <div class="input-group mb-3">

                                <input type="email" class="form-control " id="useremail"
                                    value="{{ Auth::user()->email }}" name="email" placeholder="Enter email" autofocus>
                                <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                                <input type="text" class="form-control "
                                    value="{{ Auth::user()->user_name }}" id="user_name" name="user_name" autofocus
                                    placeholder="Enter username">
                                <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>

                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control "
                                    value="{{ Auth::user()->first_name }}" id="first_name" name="first_name" autofocus
                                    placeholder="Enter first name">
                                <input type="text" class="form-control "
                                    value="{{ Auth::user()->last_name }}" id="last_name" name="last_name" autofocus
                                    placeholder="Enter last name">
                            </div>
                            <input type="password" class="form-control "
                                value="{{ Auth::user()->password }}" id="password" name="password" autofocus
                                placeholder="Enter password">
                            <br>
                            <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                            <select class="form-control " id="gender" name="gender"
                                autofocus required placeholder="Enter Phone number">
                                <option value="{{ Auth::user()->phone_number }}">
                                {{ Auth::user()->gender }}</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>

                    </div>
                    <!-- <div class="input-group mb-3">

                         <input type="password" class="form-control " value="{{ Auth::user()->password }}" id="password" name="password" autofocus placeholder="Enter password">
                         <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                     </div> -->
                    <div class="input-group mb-3">

                        <div class="input-group mb-3 ">

                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                                name="avatar" autofocus>
                            <label class="input-group-text" for="avatar">Upload</label>
                        </div>
                        <div class="text-start mt-2">
                            <img src="{{ URL::asset(Auth::user()->avatar) }}" alt="" class="rounded-circle avatar-lg">
                        </div>
                        <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-danger waves-effect waves-light UpdateProfile"
                            data-id="{{ Auth::user()->id }}" type="submit">Update</button>
                    </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endsection
    @section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!-- profile init -->
    <script src="{{ URL::asset('/assets/js/pages/profile.init.js') }}"></script>

    <script>
        $('#update-profile').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            let formData = new FormData(this);
            $('#emailError').text('');
            $('#nameError').text('');
            $('#dobError').text('');
            $('#avatarError').text('');
            $.ajax({
                url: "{{ url('user/update-profile') }}" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#emailError').text('');
                    $('#nameError').text('');
                    $('#dobError').text('');
                    $('#avatarError').text('');
                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#emailError').text(response.responseJSON.errors.email);
                    $('#nameError').text(response.responseJSON.errors.name);
                    $('#dobError').text(response.responseJSON.errors.dob);
                    $('#avatarError').text(response.responseJSON.errors.avatar);
                }
            });
        });
    </script>

@endsection
