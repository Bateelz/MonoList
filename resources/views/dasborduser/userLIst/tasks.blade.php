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
        @foreach ($list as $item)
        <div class="col-lg-4">
            <div class="card">
                
                <div class="card-body">
                    @php $list_item=App\Models\User\UserItem::where('list_id',$item->id)->get(); @endphp
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" type="button" data-toggle="modal"
                                    data-target="#renamelist">Rename</a>
                                <a class="dropdown-item" href="{{ route('list.delete',$item->id) }}">Delete</a>
                                <a class="dropdown-item edittask-details"  id="taskedit"
                                 data-bs-toggle="modal" 
                                 data-bs-target=".bs-example-modal-lg"
                                 >Share List
                                </a>
                            </div>
                        </div> <!-- end dropdown -->
                        <div >
                        <h4 class="card-title mb-4">{{ $item->name }}</h4>
                       </div>

                       
                      
                      
                        <div id="task-1">
                            <div id="upcoming-task" class="pb-1 task-list">
                                @if ($list_item)
                                @foreach ($list_item as $data )
                                        <div class="card task-box" id="uptask-1">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item edittask-details" href="#" id="taskedit"
                                                           data-bs-toggle="modal"
                                                            data-bs-target=".bs-example-modal-lg{{ $data->id }}"
                                                            data-id="{{ $data->id }}">Edit</a>
                                                        <a class="dropdown-item" href="{{ route('list.destoryItem',$data->id) }}">Delete</a>
                                                    </div>
                                                </div> <!-- end dropdown -->
                                                <div class="float-end ml-2">
                                                </div>
                                                <div>
                                                    <h5 class="font-size-15"><a href="javascript: void(0);"
                                                            class="text-dark" id="task-name">{{ $data->name }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editform{{ $data->id}}" class="modal fade bs-example-modal-lg{{ $data->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0 update-task-title"
                                                            style="display: none;">Update item</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="Post"
                                                            action="{{ route('list.editItem', $data->id ) }}" role="form">
                                                            @csrf
                                                            <input type="hidden" name="list_id" value="{{ $item->id }}">
                                                            <div class="form-group mb-3">
                                                                <label for="taskname" class="col-form-label">Item Name<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="col-lg-12">
                                                                    <input id="taskname" name="name" type="text"
                                                                        class="form-control validate"
                                                                        value="{{  $data->name }}">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-10">
                                                                    <button type="submit" class="btn btn-danger" style="background-color:#e30000" >Update Item</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                          <div id="sharelist" class="modal fade bs-example-modal-lg sharelist"
                                            tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                    <div class="mt-4 justify-content-center">
                                                <h5 class="font-size-20 mb-3">Share List</h5>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                      <a href="#" class="social-list-item bg-primary text-white border-primary">
                                                        <i class="mdi mdi-file-pdf"></i>
                                                      </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a href="#" class="social-list-item bg-success text-white border-success">
                                                        <i class="mdi mdi-whatsapp" ></i>
                                                      </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a href="#" class="social-list-item bg-danger text-white border-danger">
                                                        <i class="mdi mdi-google"> </i>
                                                      </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a href="#" value="Copy Url" onclick="Copy();"  class="social-list-item bg-secondary text-white border-secondary " >
                                                        <i class="mdi mdi-link" ></i>
                                                      </a>
                                                    </li>
                                                  </ul>
                                            </div>


                                                    </div>
                                                     </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach
                                @endif
                            </div>
                            <div class="text-center d-grid">
                                <a href="javascript: void(0);" class="btn btn-danger waves-effect waves-light" style="background-color:#e30000"
                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-lg{{ $item->id }}"
                                    data-id="{{ $item->id }}"><i class="mdi mdi-plus me-1"></i> Add New Item</a>
                            </div>
                            <div id="modalForm" class="modal fade bs-example-modal-lg-lg{{ $item->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0 add-task-title">Add New item</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="Post" action="{{ route('list.addItem',$item->id) }}" role="form">
                                                @csrf
                                                {{-- <input type="hidden" name="list_id" value="{{ $item->id }}"> --}}
                                                <div class="form-group mb-3">
                                                    <label for="taskname" class="col-form-label">Item Name<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-lg-12">
                                                        <input id="taskname" name="name" type="text" class="form-control validate"
                                                            placeholder="Enter  Name..." required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <button type="submit" class="btn btn-danger" style="background-color:#e30000" id="addtask">Add Item</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- end col -->
        <div class="col-lg-4">
            <div class="card">
                <form method='POST' action="{{ route('list.store.list') }}">
                <input type="hidden" name="color" value="color">
                        <input type="hidden" name="type" value="type">
                @csrf
                <div id="newElementId">
                </div>

                
              </form>   
                <div class="card-body">
                    <div class="text-center d-grid">
                                <a href="javascript: void(0);" id="newbtnId"  onclick="createNewElement();" class="btn btn-danger waves-effect waves-light" style="background-color:#e30000"
                                    data-bs-toggle="modal1" data-bs-target=".bs-example-modal-lg-lg"
                                    data-id="modalForm"><i class="mdi mdi-plus me-1"></i> Add New List</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
@endsection
@section('script')
    <!-- dragula plugins -->
    <script src="{{ URL::asset('/assets/libs/dragula/dragula.min.js') }}"></script>
    <script>
    function createNewElement() {
    // First create a DIV element.
	var txtNewInputBox = document.createElement('div');
    document.getElementById("newbtnId").style.display="none";


    // Then add the content (a new input box) of the element.
	txtNewInputBox.innerHTML = "<input type='text' name='name'  class='form-control' placeholder='Enter List Name'>";


    // Finally put it where it is supposed to appear.
	document.getElementById("newElementId").appendChild(txtNewInputBox);
}
</script>
// function Copy() {
//   link=window.location.href;
//   console.log(link);
//   //window.open(link);
// } 
</script>
<script>
$('#share').click(function() {
   $.ajax({
      url: '',
      data: {
         format: 'json'
      },
      error: function() {
         alert('An error has occurred');
      },
      dataType: 'jsonp',
      success: function(data) {
         link=window.location.href;
         newlink=link.concat(data);
         window.open(newlink);

      },
      type: 'GET'
   });
});

</script>





    <!-- jquery-validation -->
    <script src="{{ URL::asset('/assets/libs/jquery-validation/jquery-validation.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-kanban.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/task-form.init.js') }}"></script>
@endsection
