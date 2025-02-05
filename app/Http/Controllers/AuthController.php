<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function Login(){
        return view('admin.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        //     // $lists=array(
        //     //     array('0','User-List','User','fa-regular fa-user'),
        //     //     array('1','Category-List','Category','fa-solid fa-list-ul'),
        //     //     array('2','Item-List','Item','fa-solid fa-layer-group'),
        //     //     array('3','Adveritsing-List','ADVERTISING','fa-brands fa-adversal')
        //     // );
        //     // return view('admin.index',['lists'=>$lists]);
        return redirect('/');
        //    return redirect()->back();
      }else{
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    
    }
        
 
        // return view('admin.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
