
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background:white;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
            <!-- <li class="menu-title" key="t-apps">@lang('translation.Apps')</li>

<li>
    <a href="{{ url('user/') }}" class="waves-effect">
        <i class="bx bx-home"></i><span class="badge rounded-pill bg-success float-end"></span>
        <span key="t-dashboards">Home</span>
    </a>

</li> -->

            <!-- <li class="menu-title" key="t-pages">@lang('translation.Pages')</li> -->



                <li>
                <a href="{{ route('list.list') }}" key="t-kanban-board">
                        <i class="bx bx-task" style="color:#e30000"></i>
                        <span key="t-tasks" style="color:#e30000">Lists</span>
                    </a>
                    <li><a href="{{ route('list.create') }}" key="t-create-task">Add list</a></li> 
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- <li><a href="{{ route('list.index') }}" key="t-task-list">@lang('translation.Task_List')</a></li> -->
                        <!-- <li><a href="{{ route('list.list') }}" key="t-kanban-board">My list</a></li>
                        <li><a href="{{ route('list.create') }}" key="t-create-task">Add list</a></li> 
                    </ul>
                </li>



        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
