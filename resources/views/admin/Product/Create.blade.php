@extends('admin.layouts.app-form')
@section('title','Menu-Form')
@section('form')
<form action='{{route('admin.Product.create')}}' method="POST" class="upl" enctype="multipart/form-data">
     @csrf
     @include('admin.Form.FormProduct')
</form>
@endsection