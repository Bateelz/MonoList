@extends('dasborduser.layouts.master')

@section('title') @lang('translation.Create_List') @endsection

@section('css')
    <!-- datepicker css -->
    {{-- <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') List @endslot
        @slot('title') Create List @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create New List</h4>
                    <form  method="POST" action="{{ route('list.store.list') }}">
                        @csrf
                        <input type="hidden" name="color" value="color">
                        <input type="hidden" name="type" value="type">
                        <div  class="outer">
                            <div class="outer">
                                <div class="form-group row mb-4">
                                    <label  class="col-form-label col-lg-2">List Name</label>
                                    <div class="col-lg-10">
                                        <input  name="name" type="text" class="form-control" placeholder="Enter List Name...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Create List</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- bootstrap datepicker -->
    {{-- <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}

    <!-- Summernote js -->
    {{-- <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script> --}}

    <!-- form repeater js -->
    {{-- <script src="{{ URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script> --}}

    {{-- <script src="{{ URL::asset('/assets/js/pages/List-create.init.js') }}"></script> --}}
@endsection
