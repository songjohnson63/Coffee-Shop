@extends('admin.layouts.app-admin-report')
@section('headerAdmin')
@include('admin.components.header-list-Report')
@endsection
@section('table')

@php
    $totalqty=0;
    $totalCostUsd=0;
    $totalCostKh=0;
    $totalprice=0;
    $totalpriceUsd=0;
    $totalProfit=0;
    $totalProfitUsd=0;
@endphp
<tr>
    <th>Description</th>
    <th>QTY</th>
    <th>Cost(USD)</th>
    <th>Rate(USD)</th>
    <th>Total Cost(USD)</th>
    <th>Price</th>
    <th>Total Price(USD)</th>
    <th>Total Price(KHR)</th>
    <th>Profit (USD)</th>
    <th>Profit (KHR)</th>
 </tr>
@foreach ($data as $product)
    @foreach ($product->products as $item)
        <tr>
            <td>
                {{$item->name_en}} / {{$item->name_kh}}
            </td>
            <td>
                {{$item->pivot->qty}} 
                @php
                    $totalqty+=$item->pivot->qty;
                @endphp
            </td>
            <td>
                {{$item->cost}} $
               
            </td>
            <td>
                {{$item->cost*$item->rate}} ៛
              
            </td>
            <td>
                {{$item->cost*$item->pivot->qty}}
                @php
                $totalCostUsd+=$item->cost*$item->pivot->qty;
               @endphp
            </td>
            <td>
                {{$item->price}}
            </td>
            <td>
                {{$item->price*$item->pivot->qty}}
                @php
                  $totalpriceUsd+=$item->price*$item->pivot->qty;
               @endphp
              
            </td>
            <td>
                {{($item->price*$item->pivot->qty)*$item->rate}} ៛
                @php
                $totalprice+=($item->price*$item->pivot->qty)*$item->rate;
             @endphp
            </td>
            <td>
                {{($item->price-$item->cost)*$item->pivot->qty}} 
                
                @php
                $totalProfitUsd+=($item->price-$item->cost)*$item->pivot->qty;
             @endphp
            </td>
            <td>
                {{(($item->price-$item->cost)*$item->pivot->qty)*$item->rate}} 
                @php
                 $totalProfit+=(($item->price-$item->cost)*$item->pivot->qty)*$item->rate;
             @endphp
            </td>
        </tr>
    @endforeach
@endforeach
<tr>
   <td>Total</td>
   <td>{{$totalqty}}</td>
   <td colspan="2"></td>
   
   <td>{{$totalCostUsd}} $</td>
   <td></td>
   <td>{{$totalpriceUsd}} $</td>
   <td>{{$totalprice}} ៛</td>
   <td>{{$totalProfitUsd}} $</td>
   <td>{{$totalProfit}} ៛</td>
   
</tr>


@endsection
