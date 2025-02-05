<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function Index(Request $request,$UID){
        $user = User::findorFail($UID);
        $pms = Permission::where('user_id', $UID)->get();
        // dd($pms->users);
         
        return view('admin.Permission',['user'=>$user]);
    }

    public function Save(Request $request){
         $uid= $request->uid;
         $mids= $request->mid;
         $aids= $request->aid;
         $existingPermission = Permission::where('user_id', $uid)->first();

         if ($existingPermission) {
            
            $id=$existingPermission->id;
        $permission =Permission::findorFail($id);
        $permission->user_id = $uid;
        $permission->save();
        $permission->users()->detach($uid);
        foreach ($mids as $index => $mid) {
            $permission->users()->attach($uid, ['mid' => $mid, 'aid' => $aids[$index]]);
        }
        // foreach ($mids as $index => $mid) {
           
           
        // }
        
         return redirect()->back();
         }else{
            $permission = new Permission();
            $permission->user_id = $uid;
            $permission->save();
        
            foreach ($mids as $index => $mid) {
                $permission->users()->attach($uid, ['mid' => $mid, 'aid' => $aids[$index]]);
            }
            return redirect()->back();
         }
    

//     return redirect()->back();
// }
         
          
    }
    public function Exit(){
        // $search = $request->txt_search;
        $users = User::paginate(4);
        $CodeMenu=3;
        return view('admin.List.ListUser',['users'=>$users,'MenuCode'=>$CodeMenu]);
    }
}
