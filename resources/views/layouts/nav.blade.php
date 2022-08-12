<!-- resources/views/layouts/app.blade.php -->
 
<html>
    <head>

        <title>@yield('title')</title>
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
       <a class="navbar-brand" href="{{ url('/home') }}">{{userName()}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('getusers.index')}}">users</a>
        </li>

       

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          images
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('image.index')}}">all</a></li>
            <li><a class="dropdown-item" href="{{route('image.create')}}">create</a></li>
          </ul>
        </li>
         

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          posts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/posts">all</a></li>
            <li><a class="dropdown-item" href="{{route('posts.create')}}">create</a></li>
            <li><a class="dropdown-item" href="{{route('posts.delete')}}">Delete</a></li>
            <li><a class="dropdown-item" href="{{route('posts.delete.truncate')}}">Truncate</a></li>
            <li><a class="dropdown-item" href="{{route('queue')}}">Update With Queue</li>
          </ul>
        </li>
       
      </ul>
      
      <div style="width:50%;margin-right:10px">
      <ul class="float-end navbar-nav me-auto mb-2 mb-lg-0 dropstart">
        <li class="nav-item dropdown ">
          <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell" style="color:blue ;">{{Auth::user()->unreadNotifications->count()}}</i>
          </a>
         
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

          @foreach(Auth::user()->unreadNotifications as $notification)
          @if(isset ($notification))
          <div class="div-notfication">
          <a class="dropdown-item" style="color:blue" href="{{route('mark')}}">mark as read</a>
          </div>
          @endif
          <div class="div-notfication">
          <a class="dropdown-item" href="{{route('posts.show',$notification->data['post-id'] )}}">
            <li>{{$notification->data['user-creater']}}</li>
            <li>{{$notification->data['post-title']}}</li>
            </a>
          </div>
            @endforeach

          </ul>
        </li>
      </ul>
        </div>

    </div>
  </div>
</nav>
       @yield('content')

 
        
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

      </body>
</html>