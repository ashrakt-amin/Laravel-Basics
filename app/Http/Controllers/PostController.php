<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Mail\SendMail;
use App\Jobs\CheckPosts;
use App\Traits\TestTrait;
use App\Events\CreateUser;
use Illuminate\Http\Request;
use App\Notifications\CreatePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
   use TestTrait ;
    public function index()
    {
        // $posts = DB::table('posts')->get();
        $posts = $this->getData(Post::class);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // DB::table('posts')->insert([
        //     'user_id'=>$request->user_id ,
        //     'title'=>$request->title,
        //     'body' =>$request->body
        // ]);
        // $request->validate([
        //      'title'=>"required",
        //      'body' =>"required"
        // ]);

        $post = Post::create([
             'user_id'=>Auth::user()->id,
             'title'=>$request->title,
             'body' =>$request->body
        ]);
        
        event(new CreateUser($post));
        
        $post_id =$post->id;
        $post_title=$post->title;
        $user_name = Auth::user()->name;
        $users = User::where('id','!=',Auth::user()->id)->get();
        Notification::send($users, new CreatePost($post_id , $post_title , $user_name));


        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $getId = DB::table('notifications')->where('data->post-id',$id)
           ->where('notifiable_id',Auth::user()->id)->pluck('id')->first();
        //return $getId ;

        DB::table('notifications')->where('id',$getId)->update([
            'read_at'=>now(),
        ]);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::table('posts')->where('id',$id)->update([
        //     'title'=>$request->title,
        //     'body'=>$request->body
        // ]);
        $post = Post::findOrFail($id);
        $post->update([
            'user_id'=>Auth::user()->id,

            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('posts')->where('id',$id)->delete();
        // Post::findOrFail($id)->delete();
        Post::destroy($id);
        return redirect()->route('posts.index');
    }


public function delete()
    {
     DB::table('posts')->delete();
     return redirect()->route('posts.index');
     }



public function truncate()
    {
     DB::table('posts')->truncate();
     return redirect()->route('posts.index');
     }

     public function trashedPosts(){
        $posts = Post::onlyTrashed()->get();
        return view('posts.trash',compact('posts'));
     }

     public function restore($id){
       //using local scope scopeMyrestore()
        Post::myrestore($id);
        return redirect()->back();
    }

    public function forceDelete($id){
      Post::withTrashed()->where('id',$id)->forceDelete();
      return redirect()->back();
    }

    public function send(){
      
        $user = Auth::user();
        

        Mail::to("$user->email")->send(new SendMail($user));
         return response('email send');
    }

    public function markall(){
      
        $user = User::findOrFail(Auth::user()->id);
        foreach($user->notifications as $notification){
                $notification->markAsRead();
        }
         return  redirect()->route('posts.index') ;
    }

    public function updatequeue(){
        CheckPosts::dispatch();
         return redirect()->back();
    }
}
