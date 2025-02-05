<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function GetData(Request $request,$para){

       
        
                $Auth= Auth::user();
                $id=$Auth->id;
                $Permission = Permission::where('user_id', $id)->first();

        $search = $request->txt_search;
        $users = User::where('name', 'like', '%' . $search . '%')
        ->orwhere('endtime', $search)
        ->orwhere('starttime', $search)
        ->orwhere('id', $search)
        ->paginate(4);
        $CodeMenu=$para;
        return view('admin.List.ListUser',['Permission'=>$Permission,'users'=>$users,'MenuCode'=>$CodeMenu]);
    }
    public function GetForm(Request $request,$para){
        $CodeMenu=$para;
        return view('admin/User/Create',['MenuCode'=>$CodeMenu]);
    }
    public function Store(Request $request){
        $CodeMenu=3;
        $validated=$request->validate([
               'name'=>'required|max:255',
               'txt_status'=>'required',
               'txt_gender'=>'required',
               'txt_type'=>'required',
               'txt_photo'=>'required',
               'txt_sTime'=>'required',
               'txt_eTime'=>'required',
               'txt_phoneNum'=>'required|max:15',
               'txt_pass'=>'required',
        ]);
        $fileName = time().'_'.$request->txt_photo->getClientOriginalName();
        $filePath = $request->file('txt_photo')->storeAs(
            'uploads',
            $fileName,
            'public'
        );
        $user = new User();
        $user->password=bcrypt($request->txt_pass);
        $user->name=$request->name;
        $user->gender=$request->txt_gender;
        $user->photo=$filePath;
        $user->type=$request->txt_type;
        $user->status=$request->txt_status;
        $user->starttime=$request->txt_sTime;
        $user->endtime=$request->txt_eTime;
        $user->telephone=$request->txt_phoneNum;
        $user->save();
        return view('admin/User/Create',['MenuCode'=>$CodeMenu]);
    }
    public function Edit($id){
        $CodeMenu=3;
        $User = User::findorFail($id);
        return view('admin/User/Edit',['MenuCode'=>$CodeMenu,'data'=>$User]);
    }
    public function Update(Request $request,$id){
        $CodeMenu=3;
        $validated=$request->validate([
            'name'=>'required|max:255',
            'txt_status'=>'required',
            'txt_gender'=>'required',
            'txt_type'=>'required',
            // 'txt_photo'=>'required',
            'txt_sTime'=>'required',
            'txt_eTime'=>'required',
            'txt_phoneNum'=>'required|max:15'
        ]);
        $user = User::findorFail($id);
        $user->name=$request->name;
        $user->gender=$request->txt_gender;
        $user->type=$request->txt_type;
        $user->status=$request->txt_status;
        $user->starttime=$request->txt_sTime;
        $user->endtime=$request->txt_eTime;
        $user->telephone=$request->txt_phoneNum;
        if($request->hasFile('txt_photo')){
            $fileName = time().'_'.$request->txt_photo->getClientOriginalName();
            $filePath = $request->file('txt_photo')->storeAs(
                'uploads',
                $fileName,
                'public'
            );
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $user->photo = $filePath;
        };
        $user->save();
        return redirect()->back();
    }
}
