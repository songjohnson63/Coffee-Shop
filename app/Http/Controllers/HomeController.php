<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function BIndex(){
        return view('admin.index');
        
    }
    public function Index(){
        $Auth= Auth::user();
        if($Auth==Null){
            return view('admin.index');
        }else{
            $id=$Auth->id;
            $Permission = Permission::where('user_id', $id)->first();
            return view('admin.index',['Permission'=>$Permission]);
            
        }
      
    }
}
