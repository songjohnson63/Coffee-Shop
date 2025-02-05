@extends('admin.layouts.app-form')
@section('title','Menu-Form')
@section('form')
<form action='{{route("admin.User.create")}}' method="POST" class="upl" enctype="multipart/form-data">
     @csrf
     @include('admin.Form.FormUser')
</form>
@endsection