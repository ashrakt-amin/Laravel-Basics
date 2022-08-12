@extends('layouts.nav')
@section('title')
home
@endsection

@section('content')
<div class="container">
<h1>posts</h1>

<table class="posts table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">body</th>
      <th scope="col">pro</th>

    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)

    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td style="width:600px">{{$post->body}}</td>
      <td>
      <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$post->id}}" >edit</a>
      <a class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#delete{{$post->id}}" >softDelete</a>
      </td>
    </tr
    @include('posts.edit')
    @include('posts.delete')

    @endforeach

  </tbody>

</table>


</div>



@endsection
 

