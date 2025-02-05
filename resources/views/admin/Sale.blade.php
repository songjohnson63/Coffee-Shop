@extends('admin.layouts.app-sale')
@section('content')
<div class="container-fluid Con-sale">
    @include('admin.components.Header-Sale')
    <div class="body-sale">
         @include('admin.components.OrderBox')
         <div class="body-right" id='boxR1'>
            @include('admin.Sale.BoxClick')
         </div>   
         <div class="body-right" id='boxR2'>
            @include('admin.Sale.Payment')
         </div>  
        
         
    </div>
</div>
@endsection