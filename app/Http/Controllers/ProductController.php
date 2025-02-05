<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function GetData(Request $request,$para){
        
        $Auth= Auth::user();
        $id=$Auth->id;
        $Permission = Permission::where('user_id', $id)->first();

        $search = $request->txt_search;
        $products = Product::with('user','category')
        ->where(function ($query) use ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        })
        ->orwhere(function ($query) use ($search) {
            $query->whereHas('category', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        })
        
        ->orWhere('name_kh', 'like', '%' . $search . '%')
        ->orWhere('name_en', 'like', '%' . $search . '%')
        ->orWhere('price',$search)
        ->paginate(5);
        $CodeMenu=$para;
        return view('admin.List.ListProduct',['Permission'=>$Permission,'products'=>$products,'MenuCode'=>$CodeMenu]);
    }
    public function GetForm(Request $request,$para){
        $CodeMenu=$para;
        $Categories = Category::all();
        return view('admin/Product/Create',['Categories'=>$Categories,'MenuCode'=>$CodeMenu]);
    }
    public function Store(Request $request){
        $CodeMenu=1;
        $Categories = Category::all();
        $validated=$request->validate([
               'txt_pro_en'=>'required|max:255',
               'txt_pro_kh'=>'required|max:255',
               'txt_status'=>'required',
               'txt_price'=>'required',
               'txt_cat'=>'required',
               'txt_cost'=>'required',
               'txt_photo'=>'required',
               'txt_userID'=>'required',
               'txt_rate'=>'required',
        ]);
        $fileName = time().'_'.$request->txt_photo->getClientOriginalName();
        $filePath = $request->file('txt_photo')->storeAs(
            'uploads',
            $fileName,
            'public'
        );
        $product = new Product();
        $product->name_en=$request->txt_pro_en;
        $product->name_kh=$request->txt_pro_kh;
        $product->cost=$request->txt_cost;
        $product->price=$request->txt_price;
        $product->rate=$request->txt_rate;
        $product->category_id=$request->txt_cat;
        $product->photo=$filePath;
        $product->user_id=auth()->id();
        $product->status=$request->txt_status;
        $product->save();
        return view('admin/Product/Create',['Categories'=>$Categories,'MenuCode'=>$CodeMenu]);
    }
    public function Edit($id){
        $CodeMenu=1;
        $product = Product::findorFail($id);
        $Categories= Category::all();
        return view('admin/Product/Edit',['MenuCode'=>$CodeMenu,'data'=>$product,'Categories'=>$Categories]);
    }
    public function Update(Request $request,$id){
       
        $validated=$request->validate([
               'txt_pro_en'=>'required|max:255',
               'txt_pro_kh'=>'required|max:255',
               'txt_status'=>'required',
               'txt_cost'=>'required',
               'txt_price'=>'required',
               'txt_cat'=>'required',
               'txt_rate'=>'required',
        ]);
        
        $product = Product::findorFail($id);
        $product->name_en=$request->txt_pro_en;
        $product->name_kh=$request->txt_pro_kh;
        $product->cost=$request->txt_cost;
        $product->rate=$request->txt_rate;
        $product->price=$request->txt_price;
        $product->category_id=$request->txt_cat;
        if($request->hasFile('txt_photo')){
            $fileName = time().'_'.$request->txt_photo->getClientOriginalName();
            $filePath = $request->file('txt_photo')->storeAs(
                'uploads',
                $fileName,
                'public'
            );
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }
            $product->photo = $filePath;
        };
        $product->user_id=$request->txt_userID;
        $product->status=$request->txt_status;
        $product->save();
      
        return redirect()->back();
    }
}
