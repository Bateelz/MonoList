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


    public function list()
    {
        $list = UserList::where("user_id", Auth::id())->get();
        return $this->successResponse(["list"=>$list]);
    }


    public function store_list(Request $request){
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
        return $this->successResponse(["list"=>$list]);
    }



    public function get_link_list($list_id)
    {

        $userlink = UserLink::where('user_id', Auth::id())->where('list_id', $list_id)->first();
        if ($userlink) {
            $userlink->end_code = Carbon::now()->addDay(3);
            $userlink->save();
            return $this->successResponse(['link'=>"show_list".'/'. $userlink->code]);
        }
        return $this->errorResponse('notFound');
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
                return $this->successResponse(["userList"=>$userList,"userItem"=>$userItem]);
                // return view('dasborduser.userLIst.share-list', compact('userList', 'userItem'));
            }
          return $this->errorResponse("expired time");
        }
        return $this->errorResponse("notFound");
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
            return $this->successResponse(["list"=>$list],"Success Rename");
        }
      return $this->errorResponse('NotFound');
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
        return $this->successResponse(["item"=>$item],'Success Item Add');
    }


    public function editItem(Request $request, $id)
    {
        $item = UserItem::where('id', $id)->first();
        if ($item) {
            $item->name = $request->name ? $request->name:$item->name;
            $item->save();
            return $this->successResponse(["item"=>$item],'Success Item edit');

        }
     return $this->errorResponse('NotFound');
    }


    public function destoryItem($id)
    {
        $item = UserItem::where('id', $id)->first();
        if ($item) {
            $item->delete();
            return $this->successResponse(null,'Success Item delete');

        }
     return $this->errorResponse('Notfound');
    }


    public function delete($id)
    {
        $list = UserList::where('id', $id)->first();
        if ($list) {
            $list->delete();
            return $this->successResponse(null,'Success List delete');

        }
     return $this->errorResponse('Notfound');
    }

    public function is_complete($item){
        $useritem=UserItem::where('id',$item)->first();
        if($useritem){
           $useritem->is_complete=1;
           $useritem->save();
           return $this->successResponse(['item'=>$useritem],'success Item Completed');
        }
        return $this->errorResponse('NotFound');
    }
}
