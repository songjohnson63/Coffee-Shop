
@extends('admin.layouts.app-permission')
@section('per')
<div class="frm-permission">
    <form action="{{route('admin.Permission.Save')}}" method="POST" enctype="multipart/form-data">
        @csrf
         <div class="header"> 
          <div class="header-in">
            <input type="hidden" name="uid" value="{{$user->id}}">
            Set Permission For {{$user->name}} <i class="fa-solid fa-user-gear"></i>
          </div>
         </div>
         <div class="body">

        
            <div class="box-in-per">
                <div class="box-left">
                    User
                    <input type="checkbox" name="mid[]" id="" value="3" >
                </div>
                <div class="box-right">
                   <label for="">None</label>
                   <input type="checkbox" name="aid[]" id="" value="0" >
                   <label for="">All</label>
                   <input type="checkbox" name="aid[]" id="" value="1" >
                   
                   <label for="">Read Only</label>
                   <input type="checkbox" name="aid[]" id="" value="2">
                   <label for="">Create Only</label>
                   <input type="checkbox" name="aid[]" id="" value="3">
                   <label for="">Update Only</label>
                   <input type="checkbox" name="aid[]" id="" value="4">
                </div>
          </div>
          <div class="box-in-per">
           <div class="box-left">
               Product
               <input type="checkbox" name="mid[]" id="" value="1">
           </div>
           <div class="box-right">
               <label for="">None</label>
               <input type="checkbox" name="aid[]" id="" value="0">
               <label for="">All</label>
               <input type="checkbox" name="aid[]" id="" value="1">
               <label for="">Read Only</label>
               <input type="checkbox" name="aid[]" id="" value="2">
               <label for="">Create Only</label>
               <input type="checkbox" name="aid[]" id="" value="3">
               <label for="">Update Only</label>
               <input type="checkbox" name="aid[]" id="" value="4">
           </div>
          </div>
          <div class="box-in-per">
           <div class="box-left">
               Report
               <input type="checkbox" name="mid[]" id="" value="2">
           </div>
           <div class="box-right">
               <label for="">None</label>
               <input type="checkbox" name="aid[]" id="" value="0">
               <label for="">All</label>
               <input type="checkbox" name="aid[]" id="" value="1">
               
           </div>
          </div>
          <div class="box-in-per">
           <div class="box-left">

               Category
               <input type="checkbox" name="mid[]" id="" value="5">
           </div>
           <div class="box-right">
               <label for="">None</label>
               <input type="checkbox" name="aid[]" id="" value="0">
               <label for="">All</label>
               <input type="checkbox" name="aid[]" id="" value="1">
               <label for="">Read Only</label>
               <input type="checkbox" name="aid[]" id="" value="2">
               <label for="">Create Only</label>
               <input type="checkbox" name="aid[]" id="" value="3">
               <label for="">Update Only</label>
               <input type="checkbox" name="aid[]" id="" value="4">
           </div>
          </div>
          <div class="box-in-per">
           <div class="box-left">
               Menu
               <input type="checkbox" name="mid[]" id="" value="4">
           </div>
           <div class="box-right">
                   <label for="">None</label>
                   <input type="checkbox" name="aid[]" id="" value="0">
                   <label for="">All</label>
                   <input type="checkbox" name="aid[]" id="" value="1">
                   <label for="">Read Only</label>
                   <input type="checkbox" name="aid[]" id="" value="2">
                   <label for="">Create Only</label>
                   <input type="checkbox" name="aid[]" id="" value="3">
                   <label for="">Update Only</label>
                   <input type="checkbox" name="aid[]" id="" value="4">
           </div>
          </div>
         


           



         </div>
         <div class="footer">

            
            @php
                $id=3;
            @endphp
                <a href="{{route('admin.User.List',['id'=>$id])}}" class="btn-exit-pms">
                      Exit
                      <i class="fa-regular fa-circle-xmark"></i>
                </a>
                <div class="btn-submit">
                     <button type="submit">
                         Save 
                         <i class="fa-solid fa-download"></i>
                     </button>
                    
                </div>
         </div>

     </form>
</div>
@endsection


