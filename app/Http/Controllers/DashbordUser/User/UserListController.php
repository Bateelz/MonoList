<?php

namespace App\Http\Controllers\DashbordUser\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserItem;
use App\Models\User\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{
    public function index()
    {
        return view('dasborduser.userLIst.tasks-list');
    }

    public function list()
    {
        $list=UserList::get();
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
      return redirect()->route('list.list')->withSuccess('Create List Success');
    }


    public function editname(Request $request,$id){
        $request->validate([
            'name'=>'required',
        ]);
        $list= UserList::where('id',$id)->first();
        if($list){
            $list->name=$request->name;
            $list->save();
            return redirect()->route('list.list')->withSuccess('Create List Success');
        }
        return redirect()->route('list.list')->withSuccess('NotFoune List');
      }

      public function addItem(Request $request)
      {
          $request->validate([
              'list_id'=>'required',
              'name'=>'required',
          ]);
          $item=new  UserItem();
          $item->list_id=$request->list_id;
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
