<!-- start page title -->
<div class="row" style="background-color:#db4c3f; margin-top:0px;">
    <div class="col-12">
        <br>
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-20 " style="color:white">{{ $title }}</h4>
            

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item" style="color:white"><a style="color:white" href="javascript: void(0);">{{ $li_1 }}</a></li>
                    @if(isset($title))
                        <li class="breadcrumb-item active" style="color:white">{{ $title }}</li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<div>
<br>



</div>
<!-- end page title -->