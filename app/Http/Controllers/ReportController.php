<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
// ReportController
class ReportController extends Controller
{
    public function ReportIndex(Request $request){
        $Auth= Auth::user();
        $uid=$Auth->id;
        $Permission = Permission::where('user_id', $uid)->first();

       return view('admin.Report.Index',['Permission'=>$Permission]);
    }


    public function ReportExit(Request $request){
      
        $Auth= Auth::user();
        $uid=$Auth->id;
        $Permission = Permission::where('user_id', $uid)->first();
        return view('admin.index',['Permission'=>$Permission]);
    }


    public function HReport(Request $request,$id){
        $Auth= Auth::user();
        $uid=$Auth->id;
        $Permission = Permission::where('user_id', $uid)->first();

        $data = Sale::whereDate('created_at', now()->toDateString())->paginate(7);

        return view('admin.List.List-hisReport',['Permission'=>$Permission,'data'=>$data,'id'=>$id]);
    }


    public function TSReport(Request $request,$id){
        $Auth= Auth::user();
        $uid=$Auth->id;
        $Permission = Permission::where('user_id', $uid)->first();


        $data = Sale::with(['products' => function ($query) {
            $query->get();
        }])->whereDate('created_at', now()->toDateString())->paginate(3);
        return view('admin.List.List-SaleReport ',['Permission'=>$Permission,'data'=>$data,'id'=>$id]);
    }


    public function SearchDate(Request $request){
        $Auth= Auth::user();
        $uid=$Auth->id;
        $Permission = Permission::where('user_id', $uid)->first();

        $id = $request->id;
        // dd($id);
        $ST= $request->start_date;
        $ET= $request->end_date;

        if($id==1){
            if($ST==$ET){
                $data = Sale::whereDate('created_at', now()->toDateString())->get();
            }else{
                $data = Sale::where(function ($query) use ($ST, $ET) {
                    $query->where('created_at', '>=', $ST)
                          ->where('created_at', '<=', $ET);
                })->get();
            }
            
           
            return view('admin.List.List-hisReportWD',['Permission'=>$Permission,'data'=>$data,'id'=>$id]);
        }else if($id==2){
            if($ST==$ET){
                $data = Sale::with(['products' => function ($query) {
                    $query->get();
                }])->whereDate('created_at', now()->toDateString())->get();
            }else{
                $data = Sale::with(['products' => function ($query) {
                    $query->get();
                }])->where(function ($query) use ($ST, $ET) {
                    $query->where('created_at', '>=', $ST)
                          ->where('created_at', '<=', $ET);
                })->get();
            }
            return view('admin.List.List-SaleReportWD ',['Permission'=>$Permission,'data'=>$data,'id'=>$id]);
        }
      
    }


    
}
