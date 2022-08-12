@extends('layouts.nav')
@section('title')
home
@endsection

@section('content')
<div class="container">
<h1>trashed posts</h1>

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
      <td>{{$post->body}}</td>
      <td>
      <a class="btn btn-primary" href="{{route('posts.restore',$post->id)}}" >restore</a>
      <a class="btn btn-primary" href="{{route('posts.forceDelete',$post->id)}}" >forceDelete</a>

      </td>
    </tr
    @endforeach

  </tbody>

</table>
<a href="{{route('posts.delete')}}" class="btn btn-danger delete-all" >delete</a>
<a href="{{route('posts.delete.truncate')}}" class="btn btn-danger delete-all" >truncate</a>


</div>



@endsection
 

