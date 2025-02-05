@extends('admin.layouts.app-admin')
@php
    $Auth= Auth::user();
    $proAid=100;
@endphp
@if (isset($Permission))
  @foreach ($Permission->users as $item)
  @php
      if ($item->pivot->mid==1) {
        $proAid=$item->pivot->aid;
      }
  @endphp
  @endforeach
@endif

@section('headerAdmin')
@if ($proAid==1 || $proAid==3 || $Auth->type==1)
  @include('admin.components.header-list')
  @else
  @include('admin.components.header-list2')
  @endif
@endsection
@section('table')
 <tr>
    <th>ID</th>
    <th>Product Name</th>
    <th>Category</th>
    <th>Cost</th>
    <th>Price</th>
    <th>Photo</th>
    <th>Date-Post</th>
    <th>Poster</th>
    <th>Status</th>
    <th>Action</th>
 </tr>

 @if (count($products) > 0)
    @foreach ($products as $product)
    <tr>
    <td>{{$product->id}}</td>
    <td>{{$product->name_en}}-{{$product->name_kh}}</td>
    <td>{{$product->category->name}}</td>
    <td>{{$product->cost}}</td>
    <td>{{$product->price}}</td>
    <td>
      <img src="/storage/{{$product->photo}}" alt="" style="height:50px">
    </td>
    <td>{{$product->created_at->format('d M Y H:i A')}}</td>
    <td>{{$product->user->name}}</td>
    <td>
      @if ($product->status==1)
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
    @if ($proAid==1 || $proAid==4  || $Auth->type==1)
    <a href="{{route('admin.Product.Edit',['id'=>$product->id])}}" class="btn-Edit">
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
        <td colspan="9" style="border: none"style="border: none">
          <div class="paginate">
            {!! $products->links() !!}
          </div>
        </td>
    </tr>
 @endif
@endsection
