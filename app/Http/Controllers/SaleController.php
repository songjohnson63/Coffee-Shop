<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;

class SaleController extends Controller
{
    public function Index(Request $request){
        $categories = Category::all();
        $products = Product::all();

        $waitNo = Sale::orderBy('id', 'desc')->value('waiting_no');
        if ($waitNo === null) {
            $waitNo = 1;
        }else if($waitNo==100){
            $waitNo=1;
        }else{
            $waitNo = $waitNo + 1;
        }
        return view('admin.Sale',['categoies'=>$categories,'products'=>$products,'waitNO'=>$waitNo]);
    }
    
    public function Select(Request $request,$id){
      
        // $categories = Category::all();
        $menu=$id;
         if($id==0){
            $products = Product::all();
         }else{
            $products = Product::where('category_id',$menu)->get();
         }
        // $products = Product::where('category_id',$menu)->get();
        
       return view('admin.Sale.ProductBox',['products'=>$products]);
    }
    public function Payment(Request $request,$Requesttotal){
        $total = $Requesttotal;
       return view('admin.payment',['total'=>$total]);
    }
    // public function Invoice(Request $request){
       
    //    return view('admin.Invoice');
    // }
    public function Cencel(Request $request){
        return view('admin.index');
    }

    public function Search(Request $request,$id){
          $Search=$id;
            $products = Product::where('name_en', 'like', '%' . $Search . '%')
            ->orWhere('name_kh', 'like', '%' . $Search . '%')
            ->orWhere('price',$Search)
            ->orWhere('id',$Search)
            ->get();
        // $products = Product::all();
            return view('admin.Sale.ProductBox',['products'=>$products]);
    }
    public function Save(Request $request,$txtIdValues,$txtQTY,$txtdis,$txtChangeKH,$txtAmount,$txtMethodPay,$reKhr,$reUsd,$waitNo,$reBack){
        // $data = $data;
    
        
  
        $sale = new Sale();
        $sale->user_id=auth()->id();
        $sale->discount=$txtdis;
        $sale->amount=$txtAmount;
        $sale->exchange=$txtChangeKH;
        $sale->payment_method=$txtMethodPay;
        $sale->waiting_no=$waitNo;
        $sale->receive=$reUsd;
        $sale->moneychange=$reBack;
        $sale->save();
    //   dd($txtIdValues);
    //    $txtIdValuesArray = explode(',', $txtIdValues);
    //     $txtQtyValuesArray = explode(',', $txtQTY);

    //      $sale->products()->attach($txtIdValuesArray, [
    //     'qty' =>  $txtQtyValuesArray ]);
        $txtIdValuesArray = explode(',', $txtIdValues);
        $txtQtyValuesArray = explode(',', $txtQTY);

        $products = [];
        foreach ($txtIdValuesArray as $key => $productId) {
            $products[$productId] = ['qty' => $txtQtyValuesArray[$key]];
        }

        $sale->products()->attach($products);


        $lastSale = Sale::orderBy('id', 'desc')->first();
        // $sale->products()->sync($txtIdValuesArray,['qty' => $txtQtyValuesArray]);
       

       
        return view('admin.invoice',['Sale'=>$lastSale,'reKhr'=>$reKhr,'reUsd'=>$reUsd,'waitNo'=>$waitNo,'reBack'=>$reBack]);
  }
}
