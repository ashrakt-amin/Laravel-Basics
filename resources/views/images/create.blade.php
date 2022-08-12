@extends('layouts.nav')
@section('title')
posts
@endsection


@section('content')

<div  class="container">


    <div class="d-flex justify-content-center">
<!--           
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
    <form class="posts-form" style="width:400px" action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
            @csrf

        <input class="form-control" value="" name="image" type="file">
        
        <button type="submit" class="btn btn-primary mb-3">enter</button>


        </form>
   </div>
</div>
@endsection
