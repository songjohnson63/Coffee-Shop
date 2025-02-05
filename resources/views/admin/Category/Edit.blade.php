@extends('admin.layouts.app-form')
@section('title','Category-Form')
@section('form')
    <form method="POST" action="{{route('admin.Category.Update',['id'=>$data->id])}}" enctype="multipart/form-data">
        @method('PUT')
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