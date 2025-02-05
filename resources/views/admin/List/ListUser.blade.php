@extends('admin.layouts.app-admin')
@php
    $Auth= Auth::user();
    $userAid=100;
@endphp
@if (isset($Permision))
@foreach ($Permission->users as $item)
@php
    if ($item->pivot->mid==3) {
      $userAid=$item->pivot->aid;
    }
@endphp
@endforeach
@endif
@section('headerAdmin')
  @if ($userAid==1 || $userAid==3 || $Auth->type==1)
  @include('admin.components.header-list')
  @else
  @include('admin.components.header-list2')
  @endif

@endsection

@section('table')

 <tr>
    <th>ID </th>
    <th>Full-Name</th>
    <th>Work-Time</th>
    <th>Position</th>
    <th>Telephone</th>
    <th>Photo</th>
    <th>Date-Post</th>
    <th>Status</th>
    <th>Action</th>
   
 </tr>
 @if (count($users) > 0)
 @foreach ($users as $user)
 <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->starttime}} - {{$user->endtime}}</td>
    <td>
        @if ($user->type==1)
        Admin
        <img src="{{asset('img/manager.png')}}" alt="" style="height: 30px">
        @else
        @if ($user->type==2)
              
        @if ($Auth->type==1)
        <div class="btn-pms">
            Client
            <img src="{{asset('img/client.png')}}" alt="" style="height: 30px">
         </div>
        @else
        <div>
            Client
            <img src="{{asset('img/client.png')}}" alt="" style="height: 30px">
         </div>
            
        @endif

             
           
        @else
        @if ($user->type==3)
        Cashier
        <img src="{{asset('img/cashier-machine.png')}}" alt="" style="height: 30px">
        @else
        @if ($user->type==4)
        Baristas
        <img src="{{asset('img/barista.png')}}" alt="" style="height: 30px">
        @else
        @if ($user->type==5)
        Cleaner
       <img src="{{asset('img/house-keeping.png')}}" alt="" style="height: 30px">
        @else
        @if ($user->type==6)
        Security
        <img src="{{asset('img/guard.png')}}" alt="" style="height: 30px">
        @else
        @endif  
        @endif  
        @endif  
        @endif  
        @endif    
        @endif
    </td>
    <td>{{$user->telephone}} </td>
    <td>
        <img src="/storage/{{$user->photo}}" alt="" style="height: 50px" ></td>
        
    <td>{{$user->created_at->format('d M Y H:i A')}}</td>
    <td>
        @if ($user->status==1)
        <div class="btn-status">
            <img src="{{asset('img/check-mark.png')}}" alt="">
        </div>
        @else
        <div class="btn-status">
            <img src="{{asset('img/cancel.png')}}" alt="">
        </div>
        @endif
        
    </td>
    <td>
        @if ($userAid==1 || $userAid==4 || $Auth->type==1)
        <div class="action">
            <a href="{{route("admin.User.Edit",['id'=>$user->id])}}" class="btn-Edit">
                <img src="{{asset('img/edit.png')}}" alt="">
            </a>
        </div>
        @else
        <div class="action">
            <a  class="btn-Edit">
                <img src="{{asset('img/edit.png')}}" alt="">
            </a>
        </div>
        @endif
       
    </td>
</tr>
 @endforeach
 <tr>
    <td colspan="9" style="border: none">
        <div class="paginate">
        {{ $users->links() }}
        </div>
    </td>
</tr>
 @endif

@endsection