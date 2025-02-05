@extends('admin.layouts.app-admin')
@php
    $Auth= Auth::user();
    $catAid=100;
@endphp
@if (isset($Permission))
    @foreach ($Permission->users as $item)
    @php
        if ($item->pivot->mid==5) {
        $catAid=$item->pivot->aid;
        }
    @endphp
    @endforeach
@endif

@section('headerAdmin')
@if ($catAid==1 || $catAid==3 || $Auth->type==1)
@include('admin.components.header-list')
@else
@include('admin.components.header-list2')
@endif
@endsection

@section('table')
 <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Menu</th>
    <th>Date-Post</th>
    <th>Status</th>
    <th>Action</th>
 </tr>
 @if(count($categories) > 0)
  @foreach ($categories as $category)
 <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td>{{$category->menu->name}}</td>
    <td>{{$category->created_at->format('d M Y H:i A')}}</td>
    
    <td>
       
            @if ($category->status==1)
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
           @if ($catAid==1 || $catAid==4 || $Auth->type=1)
           <a href="{{route('admin.Category.Edit',['id'=>$category->id])}}" class="btn-Edit">
            <img src="{{asset('img/edit.png')}}" alt="">
        </a>
           @else
           <a  class="btn-Edit">
            <img src="{{asset('img/edit.png')}}" alt="">
        </a>
           @endif
            {{-- <form action="{{route('admin.Category.Destroy',['id'=>$category->id])}}" method="post">
            @method('DELETE')
            @csrf
            <button role="button" type="submit" class="btn-del">
                <img src="{{asset('img/delete.png')}}" alt="">
            </button>
        </form> --}}
        </div>
    </td>
</tr>
 @endforeach
 <tr>
    <td colspan="5" style="border: none">
        <div class="paginate">
        {{ $categories->links() }}
        </div>
    </td>
</tr>

@endif
@endsection