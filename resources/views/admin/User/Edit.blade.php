@extends('admin.layouts.app-form')
@section('title','Menu-Form')
@section('form')
    <form method="POST" action="{{route("admin.User.Update",["id"=>$data->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
     @include('admin.Form.FormUser')
</form>

@endsection