<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function GetData(Request $request,$para){
        $Auth= Auth::user();
        $id=$Auth->id;
        $Permission = Permission::where('user_id', $id)->first();

        $search = $request->txt_search;
        $categories = Category::with('menu')
        ->where(function ($query) use ($search) {
            $query->whereHas('menu', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        })
        ->orwhere('name','like','%'.$search.'%')
        ->orwhere('id',$search)
        ->paginate(4);
        $CodeMenu=$para;
        return view('admin.List.ListCategory',['Permission'=>$Permission,'categories'=>$categories,'MenuCode'=>$CodeMenu]);
    }
    public function GetForm(Request $request,$para){
        $CodeMenu=$para;
        $Menus= Menu::all();
        return view('admin/Category/Create',['MenuCode'=>$CodeMenu,'menus'=>$Menus]);
    }
    public function Store(Request $request){
        $CodeMenu=5;
        $Menus= Menu::all();
        $validated=$request->validate([
               'txt_category'=>'required|max:255',
               'txt_status'=>'required',
               'txt_menu_id'=>'required'
        ]);
        $Category = new Category();
        $Category->name=$request->txt_category;
        $Category->menu_id=$request->txt_menu_id;
        $Category->status=$request->txt_status;
        $Category->save();
        return view('admin/Category/Create',['MenuCode'=>$CodeMenu,'menus'=>$Menus]);
    }
    public function Edit($id){
        $CodeMenu=5;
        $Menus= Menu::all();
        $Category = Category::findorFail($id);
        return view('admin/Category/Edit',['menus'=>$Menus,'MenuCode'=>$CodeMenu,'data'=>$Category]);
    }
    public function Update(Request $request,$id){
        $CodeMenu=5;
        $validated=$request->validate([
               'txt_category'=>'required|max:255',
               'txt_status'=>'required',
               'txt_menu_id'=>'required'
        ]);
        $Category = Category::findorFail($id);
        $Category->name=$request->txt_category;
        $Category->menu_id=$request->txt_menu_id;
        $Category->status=$request->txt_status;
        $Category->save();
         return redirect()->back();
    }
    // public function destroy($id){
    //     $Category = Category::findorFail($id);
    //     if($Category){
    //         $Category->delete();
    //     }
    //     $categories = Category::all();
    //     $CodeMenu=5;
    //     return view('admin.List.ListCategory',['categories'=>$categories,'MenuCode'=>$CodeMenu]);
    // }
}
