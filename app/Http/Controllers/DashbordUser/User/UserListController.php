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
        $list=UserList::where("user_id",Auth::id())->get();
        return view('dasborduser.userLIst.tasks',compact('list'));
    }


    public function create()
    {
        return view('dasborduser.userLIst.tasks-create');
    }

    public function store(Request $request){
    // return $request->all();
      $request->validate([
          'name'=>'required',
          'type'=>'required',
          'color'=>'required',
      ]);
      $list=new UserList();
      $list->name=$request->name;
      $list->type=$request->type;
      $list->color=$request->color;
      $list->user_id=Auth::id();
      $list->save();

      // Todo:Add Code List
      $code=Str::random(22);
      $userlink=new UserLink();
      $userlink->user_id=Auth::id();
      $userlink->list_id= $list->id;
      $userlink->code=$code;
      $userlink->end_code=null;
      $userlink->save();
      return redirect()->route('list.list')->withSuccess('Create List Success');
    }

    public function get_link_list($list_id){
        
        $userlink=UserLink::where('user_id',Auth::id())->where('list_id',$list_id)->first();
        if($userlink){
            $userlink->end_code=Carbon::now()->addDay(3);
            $userlink->save();
            return response()->json(['msg'=>'success','data'=>$userlink->code],200);
        }
         return response()->json(['msg'=>'notfound','data'=>null],422);
        }

        public function show_list($token)
        {
            $userlink=UserLink::where('code',$token)->first();
            $list_id=$userlink ? $userlink->list_id:null;
            $userList=UserList::where('id',$list_id)->first();

        }


    public function editname(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ]);
        $list= UserList::where('id',$id)->first();
        if($list){
            $list->name=$request->name;
            $list->save();
            return redirect()->route('list.list')->withSuccess('Rename List Success');
        }
        return redirect()->route('list.list')->withSuccess('NotFoune List');
      }

      public function addItem(Request $request,$id)
      {
          $request->validate([
              'name'=>'required',
          ]);
          $item=new  UserItem();
          $item->list_id=$id;
          $item->name=$request->name;
          $item->user_id=Auth::id();
          $item->save();
          return back();
      }


      public function editItem(Request $request,$id)
      {
          $item= UserItem::where('id',$id)->first();
          if($item){
            $item->name=$request->name;
            $item->save();
            return back();
          }
          return back()->with('error','notFound');

      }


      public function destoryItem($id)
      {
          $item= UserItem::where('id',$id)->first();
          if($item){
            $item->delete();
            return back()->withSuccess('Delete Item Success');
          }
          return back()->with('error','notFound');

      }


      public function delete($id){
        $list= UserList::where('id',$id)->first();
        if($list){
            $list->delete();
            return redirect()->route('list.list')->withSuccess('Delete List Success');
        }
        return redirect()->route('list.list')->withSuccess('NotFoune List');
      }


}
