<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Traits\UploadImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use UploadImage ;
    public function index()

    {
        $images = Image::all();
        return view('images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('images.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $name = $request->file('image')->getClientOriginalName() ;
        // $path = $request->file('image')->storeAs('folder1', $name , 'ashrakt');
        // return $path ;
        $path = $this->uploadImage($request ,'folder1');
        Image::create([
            'path'=>$path,
        ]);
        return redirect()->route('image.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $path = $this->uploadImage($request ,'folder1');
        $image = Image::findOrFail($id);
        
        Image::where('id',$image->id)->update([
            'path'=>$path,
        ]);

        return redirect()->route('image.index');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Image::where('id',$image->id)->delete();
        return redirect()->route('image.index');

    }
}
