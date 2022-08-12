@extends('layouts.nav')
@section('title')
home
@endsection

@section('content')
<div class="container">
<h1>images</h1>

<table class="posts table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">pro</th>

    </tr>
  </thead>
  <tbody>
  @foreach($images as $image)

    <tr>
      <td>{{$image->id}}</td>
      <td><img src="{{asset('imgs/'.$image->path)}}"></td>
      <td>
      <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$image->id}}" >edit</a>
      <a class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#delete{{$image->id}}" >softDelete</a>
      </td>
    </tr
    @include('images.edit')
    @include('images.delete')

    @endforeach

  </tbody>

</table>


</div>



@endsection
 

