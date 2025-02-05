@extends('admin.layouts.app-form')
@section('title','Category-Form')
@section('form')
<form action='{{route('admin.Category.create')}}' method="POST" class="upl" enctype="multipart/form-data">
     @csrf
     @include('admin.Form.FormCategory')
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection