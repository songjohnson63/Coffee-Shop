@extends('admin.layouts.app-admin-report')
@section('headerAdmin')
@include('admin.components.header-list-Report')
@endsection
@php
    $totalAmount = 0;
    $totalAmountUsd = 0;
    $totalAmountAtD = 0;
    $totalAmountAtDUsd = 0;
    $totalReceive=0;
    $totalReceiveUsd=0;
    $totalChange=0;
    $totalChangeUsd=0;

@endphp
@section('table')
<tr>
    <th>NO</th>
    <th width='150'>Time in</th>
    <th width='120'>Cashier</th>
    <th>Total(KHR)</th>
    <th>Total(USD)</th>
    <th width='50'>Dis</th>
    <th>T.A.Dis(KHR)</th>
    <th>T.A.Dis(USD)</th>
    <th>Rate(USD)</th>
    <th>Receive(KHR)</th>
    <th>Receive(USD)</th>
    <th>Change(KHR)</th>
    <th>Change(USD)</th>
    <th>Payment Method</th>
    
 </tr>
 @if (count($data)>0)
@foreach ($data as $sale)
<tr>
    <td>{{$sale->id}}</td>
    <td>{{$sale->created_at->format('D M y h:i A')}}</td>
    <td>{{$sale->user->name}}</td>
    <td>{{$sale->amount * $sale->exchange}} ៛
        @php
            $totalAmount +=$sale->amount * $sale->exchange
        @endphp
    
    </td>
    <td>{{$sale->amount }} $
        @php
            $totalAmountUsd +=$sale->amount;
        @endphp
    </td>
    <td>{{$sale->discount }}%</td>
    <td>{{($sale->amount * $sale->exchange) - (($sale->amount * $sale->exchange))* $sale->discount/100}} ៛
        @php
         $totalAmountAtD +=($sale->amount * $sale->exchange) - (($sale->amount * $sale->exchange))* $sale->discount/100;
    @endphp
    </td>
    <td>{{($sale->amount ) - (($sale->amount))* $sale->discount/100}} $
        @php
         $totalAmountAtDUsd +=($sale->amount) - (($sale->amount))* $sale->discount/100;
    @endphp
    </td>
    <td>1$ = {{$sale->exchange}}</td>
    <td>{{$sale->receive*$sale->exchange}}
        
            @php
         $totalReceive +=$sale->receive*$sale->exchange;
    @endphp
    </td>
    <td>{{$sale->receive}}
        @php
        $totalReceiveUsd +=$sale->receive;
   @endphp
    </td>
    <td>{{$sale->moneychange*$sale->exchange}}
        @php
        $totalChange +=$sale->moneychange*$sale->exchange
   @endphp
    </td>
    <td>{{$sale->moneychange}}
        @php
        $totalChangeUsd +=$sale->moneychange
   @endphp
    </td>
    <td>{{$sale->payment_method}}</td>
</tr>
@endforeach
<tr>
    <td colspan="3">Total</td>
    <td >{{$totalAmount }} ៛</td>
    <td colspan="2">{{$totalAmountUsd }} </td>
    <td >{{$totalAmountAtD}} ៛</td>
    <td colspan="2">{{$totalAmountAtDUsd}} $</td>
    <td >{{$totalReceive}} ៛</td>
    <td>{{$totalReceiveUsd}} $</td>
    <td >{{$totalChange}} ៛</td>
    <td colspan="2">{{$totalChangeUsd}} $</td>
</tr>    
@endif


@endsection