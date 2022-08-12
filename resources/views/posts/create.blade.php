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
    <form class="posts-form" style="width:400px" action="{{route('posts.store')}}" method="post" >
            @csrf

        <input class="form-control  @error('title') is-invalid @enderror" value="{{old('title')}}" name="title" type="text" placeholder="title" >
         @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        <input class="form-control @error('body') is-invalid @enderror" type="text" value="{{old('body')}}" name="body" placeholder="content" >
         @error('body')
          <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        <button type="submit" class="btn btn-primary mb-3">enter</button>


        </form>
   </div>
</div>
@endsection
