
<!-- edit Modal -->
<div class="modal fade" id="edit{{$post->id}}"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$post->id}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
       <form  action="{{route('posts.update',$post->id)}}" method="POST" class="posts-form" >
       {{ csrf_field() }}
       {{ method_field('put') }}
        <input class="form-control" name="user_id" type="hidden" value="1" >
        <input class="form-control" value="{{$post->title}}" name="title" type="text" placeholder="title" >
        <input class="form-control" type="text" value="{{$post->body}}" name="body" placeholder="content" >
        <button type="submit" class="btn btn-primary mb-3">enter</button>
       </form>    
      </div>

      
    </div>
  </div>
</div>


