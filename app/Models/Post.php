<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ="posts";

     protected $fillable=['title' ,'body','user_id' ,'check'];
    // protected $guarded =['body'];

    public function scopeMyrestore($query ,$id){
        return $query->withTrashed()->where('id',$id)->restore();
    }
}
