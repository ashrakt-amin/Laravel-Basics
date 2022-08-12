@extends('layouts.nav')
@section('title')
users
@endsection


@section('content')
<div class="container">
<h1>users</h1>

<table class="posts table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">nick</th>


    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)

    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone->number}}</td>
      @foreach($user->nicknames as $username)

      <td>{{$username->nickname}}</td>

   @endforeach
      
    </tr
   
    @endforeach

  </tbody>

</table>

</div>



@endsection
 

