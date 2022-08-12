<?php

namespace App\Traits;

use Illuminate\Http\Request;


trait UploadImage{

  public function uploadImage(Request $request ,$folderName){
    $name = $request->file('image')->getClientOriginalName() ;
    $path = $request->file('image')->storeAs($folderName , $name , 'ashrakt');
    return $path ;
  }
    
}
