<?php

namespace App\Http\Controllers\DashbordUser\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserItem;
use App\Models\User\UserLink;
use App\Models\User\UserList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserListController extends Controller
{
    public function index()
    {
        return view('dasborduser.userLIst.tasks-list');
    }

    public function list()
    {
        $list = UserList::where("user_id", Auth::id())->get();
        return view('dasborduser.userLIst.tasks', compact('list'));
    }


    public function create()
    {
        return view('dasborduser.userLIst.tasks-create');
    }

    public function store(Request $request)
    {   
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'color' => 'required',
        ]);
        $list = new UserList();
        $list->name = $request->name;
        $list->type = $request->type;
        $list->color = $request->color;
        $list->user_id = Auth::id();
        $list->save();

        // Todo:Add Code List
        $code = Str::random(22);
        $userlink = new UserLink();
        $userlink->user_id = Auth::id();
        $userlink->list_id = $list->id;
        $userlink->code = $code;
        $userlink->end_code = null;
        $userlink->save();
        // alert()->success('Create List Success','Create Success');
        return redirect()->route('list.list');
    }

    public function get_link_list($list_id)
    {

        $userlink = UserLink::where('user_id', Auth::id())->where('list_id', $list_id)->first();
        if ($userlink) {
            $userlink->end_code = Carbon::now()->addDay(3);
            $userlink->save();
            return response()->json(['msg' => 'success', 'data' =>"show_list".'/'. $userlink->code], 200);
        }
        // alert()->error('Not Found List','Not Found');
        return response()->json(['msg' => 'notfound', 'data' => null], 422);
    }

    public function show_list($token)
    {
        $userlink = UserLink::where('code', $token)->first();
        $time = Carbon::now()->format('Y-m-d');
        $timeEnd = Carbon::parse($userlink->end_code)->format('Y-m-d');
        if ($userlink) {
            if ($time < $timeEnd ) {
                $list_id = $userlink ? $userlink->list_id : null;
                $userList = UserList::where('id', $list_id)->first();
                $userItem = UserItem::where('list_id', $list_id)->get();
                return view('dasborduser.userLIst.share-list', compact('userList', 'userItem'));
            }
            abort(419);
        }
        abort(404);
    }


    public function editname(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $list = UserList::where('id', $id)->first();
        if ($list) {
            $list->name = $request->name;
            $list->save();
            // alert()->success('Rename List Success','Success Rename');
            return redirect()->route('list.list');
        }
        // alert()->error('Not Foune List','Not Found');
        return redirect()->route('list.list');
    }

    public function addItem(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $item = new  UserItem();
        $item->list_id = $id;
        $item->name = $request->name;
        $item->user_id = Auth::id();
        $item->save();
        // alert()->success('Add Item Success','Success Add');
        return back();
    }


    public function editItem(Request $request, $id)
    {
        $item = UserItem::where('id', $id)->first();
        if ($item) {
            $item->name = $request->name;
            $item->save();
            // alert()->success('Edit Item Success','Success Edit');
            return back();
        }
        // alert()->error('Not Found Item','Not Found');
        return back();
    }


    public function destoryItem($id)
    {
        $item = UserItem::where('id', $id)->first();
        if ($item) {
            $item->delete();
            // alert()->success('Delete Item Success','Delete Success');
            return back();
        }
        // alert()->error('Not Found Item','Not Found');
        return back();
    }


    public function delete($id)
    { dd(id);
        $list = UserList::where('id', $id)->first();
        if ($list) {
            $list->delete();
            // alert()->success('Delete List Success','Delete Success');
            return redirect();
        }
        // alert()->error('Not Found List','Not Found');
        return redirect()->route('list.list');
    }

    public function is_complete($item){
        $useritem=UserItem::where('id',$item)->first();
        if($useritem){
           $useritem->is_complete=1;
           $useritem->save();
           return response()->json(['msg'=>'success','data'=>$useritem],200);
        }
        return response()->json(['msg'=>'faild','data'=>null],422);
    }
}
