<?php

namespace App\Http\Controllers\DashbordUser\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        return view('dasborduser.userLIst.tasks-list');
    }

    public function list()
    {
        return view('dasborduser.userLIst.tasks');
    }


    public function create()
    {
        return view('dasborduser.userLIst.tasks-create');
    }
}
