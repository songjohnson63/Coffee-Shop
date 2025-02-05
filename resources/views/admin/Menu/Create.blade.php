@extends('admin.layouts.app-form')
@section('title','Menu-Form')
@section('form')
<form action='{{route("admin.Menu.create")}}' method="POST" class="upl" enctype="multipart/form-data">
     @csrf
     @include('admin.Form.FormMenu')
</form>

@endsection