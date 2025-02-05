<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function GetData(Request $request,$para){
        $Auth= Auth::user();
        $id=$Auth->id;
        $Permission = Permission::where('user_id', $id)->first();

        $search = $request->txt_search;
        $menus = Menu::where('name','like','%'.$search.'%')
        ->orwhere('id',$search)
        ->paginate(4);
        $CodeMenu=$para;
        return view('admin.List.ListMenu',['menus'=>$menus,'MenuCode'=>$CodeMenu,'Permission'=>$Permission]);
    }
    public function GetForm(Request $request,$para){
        $CodeMenu=$para;
        return view('admin/Menu/Create',['MenuCode'=>$CodeMenu]);
    }
    public function Store(Request $request){
        $CodeMenu=4;
        $validated=$request->validate([
               'txt_name'=>'required|max:255',
               'txt_status'=>'required'
        ]);
        $Menu = new Menu();
        $Menu->name=$request->txt_name;
        $Menu->status=$request->txt_status;
        $Menu->save();
        return view('admin/Menu/Create',['MenuCode'=>$CodeMenu]);
    }
    public function Edit($id){
        $CodeMenu=4;
        $Menu = Menu::findorFail($id);
        return view('admin/Menu/Edit',['MenuCode'=>$CodeMenu,'data'=>$Menu]);
    }
    public function Update(Request $request,$id){
        $CodeMenu=4;
        $validated=$request->validate([
               'txt_name'=>'required|max:255',
               'txt_status'=>'required'
        ]);
        $Menu = Menu::findorFail($id);
        $Menu->name=$request->txt_name;
        $Menu->status=$request->txt_status;
        $Menu->save();
         return redirect()->back();
    }
    // public function destroy($id){
    //     $Menu = Menu::findorFail($id);
    //     if($Menu){
    //         $Menu->delete();
    //     }
    //     $menus = Menu::all();
    //     $CodeMenu=4;
    //     return view('admin.List.ListMenu',['menus'=>$menus,'MenuCode'=>$CodeMenu]);
    // }
}
