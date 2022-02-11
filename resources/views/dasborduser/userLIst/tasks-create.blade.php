@extends('dasborduser.layouts.master')

@section('title') @lang('translation.Create_List') @endsection

@section('css')
    <!-- datepicker css -->
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
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
                    <form class="outer-repeater"  method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="form-group row mb-4">
                                    <label for="Listname" class="col-form-label col-lg-2">List Name</label>
                                    <div class="col-lg-10">
                                        <input id="Listname" name="name" type="text" class="form-control" placeholder="Enter List Name...">
                                    </div>
                                </div>
                                {{-- <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">List Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="Listdesc-editor" name="area"></textarea>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">List Date</label>
                                    <div class="col-lg-10">
                                        <div class="input-daterange input-group" data-provide="datepicker">
                                            <input type="text" class="form-control" placeholder="Start Date" name="start" />
                                            <input type="text" class="form-control" placeholder="End Date" name="end" />
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner form-group mb-0 row">
                                        <label class="col-form-label col-lg-2">Add Team Member</label>
                                        <div  data-repeater-item class="inner col-lg-10 ms-md-auto">
                                            <div class="mb-3 row align-items-center">
                                                <div class="col-md-6">
                                                    <input type="text" class="inner form-control" placeholder="Enter Name..."/>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-4 mt-md-0">
                                                        <input class="form-control" type="file">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="mt-2 mt-md-0 d-grid">
                                                        <input data-repeater-delete type="button" class="btn btn-primary inner" value="Delete"/>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-lg-10">
                                            <input data-repeater-create type="button" class="btn btn-success inner" value="Add Number"/>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row mb-4">
                                    <label for="Listbudget" class="col-form-label col-lg-2">Budget</label>
                                    <div class="col-lg-10">
                                        <input id="Listbudget" name="Listbudget" type="text" placeholder="Enter List Budget..." class="form-control">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Create List</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('script')
    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!-- Summernote js -->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- form repeater js -->
    <script src="{{ URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/List-create.init.js') }}"></script>
@endsection
