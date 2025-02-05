@extends('admin.layouts.app-admin')
@php
    $Auth= Auth::user();
    $menuAid=100;
@endphp
@if (isset($Permission))
@foreach ($Permission->users as $item)
@php
    if ($item->pivot->mid==4) {
      $menuAid=$item->pivot->aid;
    }
@endphp
@endforeach
@endif
@section('headerAdmin')
@if ($menuAid==1 || $menuAid==3 || $Auth->type==1)
@include('admin.components.header-list')
@else
@include('admin.components.header-list2')
@endif
@endsection

@section('table')
 <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Date-Post</th>
    <th>Status</th>
    <th>Action</th>
 </tr>
 @if(count($menus) > 0)
 @foreach ($menus as $menu)
 <tr>
    <td>{{$menu->id}}</td>
    <td>{{$menu->name}}</td>
    <td>{{$menu->created_at->format('d M Y H:i A')}}</td>
    
    <td>
        @if ($menu->status==1)
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
        <div class="action">
            @if ($menuAid == 1 || $menuAid == 4 || $Auth->type==1)
            <a  href="{{route('admin.Menu.Edit',['id'=>$menu->id])}}" class="btn-Edit">
                <img src="{{asset('img/edit.png')}}" alt="">
            </a>
            @else
            <a  class="btn-Edit">
                <img src="{{asset('img/edit.png')}}" alt="">
            </a>
            @endif
          
        </div>
    </td>
</tr>
 @endforeach
 <tr>
    <td colspan="5" style="border: none">
        <div class="paginate">
        {{ $menus->links() }}
        </div>
    </td>
</tr>

@endif
 

@endsection