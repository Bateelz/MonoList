@extends('dasborduser.layouts.master')

@section('title') @lang('translation.Kanban_Board') @endsection

@section('css')
    <!-- dragula css -->
    <link href="{{ URL::asset('/assets/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') List @endslot
        @slot('title') List Board @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Rename</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div> <!-- end dropdown -->

                    <h4 class="card-title mb-4">List name</h4>
                    <div id="task-1">
                        <div id="upcoming-task" class="pb-1 task-list">

                            <div class="card task-box" id="uptask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#uptask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">Item name</a></h5>
                                       
                                    </div>
                                   

                                    
                                </div>

                            </div>
                            <!-- end task card -->

                            <div class="card task-box" id="uptask-2">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#" data-id="#uptask-2">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name">item name 2</a></h5>
                                    </div>

                                

                                    
                                </div>

                            </div>
                            <!-- end task card -->

                           

                        </div>

                        <div class="text-center d-grid">
                            <a href="javascript: void(0);" class="btn btn-danger waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add New Item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div id="modalForm" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 add-task-title">Add New item</h5>
                    <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="NewtaskForm" role="form">
                        <div class="form-group mb-3">
                            <label for="taskname" class="col-form-label">Item Name<span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input id="taskname" name="taskname" type="text" class="form-control validate" placeholder="Enter Task Name..." required>
                            </div>
                        </div>
                        <!-- <div class="form-group mb-3">
                            <label class="col-form-label">Task Description</label>
                            <div class="col-lg-12">
                                <textarea id="taskdesc" class="form-control" name="taskdesc"></textarea>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="col-form-label">Add Team Member<span class="text-danger">*</span></label>
                            <ul class="list-unstyled user-list validate" id="taskassignee">
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-1" name="member[]">
                                        <label class="form-check-label ms-2" for="member-1">Albert Rodarte</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-2" name="member[]">
                                        <label class="form-check-label ms-2" for="member-2">Hannah Glover</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-2.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-3" name="member[]">
                                        <label class="form-check-label ms-2" for="member-3">Adrian Rodarte</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-3.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-4" name="member[]">
                                        <label class="form-check-label ms-2" for="member-4">Frank Hamilton</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-4.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-5" name="member[]">
                                        <label class="form-check-label ms-2" for="member-5">Justin Howard</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-6" name="member[]">
                                        <label class="form-check-label ms-2" for="member-6">Michael Lawrence</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-6.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-7" name="member[]">
                                        <label class="form-check-label ms-2" for="member-7">Oliver Sharp</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-7.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary mb-2 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="member-8" name="member[]">
                                        <label class="form-check-label ms-2" for="member-8">Richard Simpson</label>
                                        <img src="{{ URL::asset('/assets/images/users/avatar-8.jpg') }}" class="rounded-circle avatar-xs m-1" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-form-label">Status<span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <select class="form-select validate" id="TaskStatus" required>
                                    <option value="" selected>Choose..</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Complete">Complete</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="taskbudget" class="col-form-label">Budget<span class="text-danger">*</span></label>
                            <div class="col-lg-12">
                                <input id="taskbudget" name="taskbudget" type="number" placeholder="Enter Task Budget..." class="form-control" required>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-10">
                                <button type="button" class="btn btn-danger" id="addtask">Add Item</button>
                                <button type="button" class="btn btn-danger" id="updatetaskdetail">Update Item</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection
@section('script')
    <!-- dragula plugins -->
    <script src="{{ URL::asset('/assets/libs/dragula/dragula.min.js') }}"></script>

    <!-- jquery-validation -->
    <script src="{{ URL::asset('/assets/libs/jquery-validation/jquery-validation.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-kanban.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-form.init.js') }}"></script>
@endsection
