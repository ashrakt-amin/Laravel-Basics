<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nickname extends Model
{
    use HasFactory;
    protected $fillable = ['nickname','user_id'];

    public function user(){ //one to many

       return $this->belongsTo(User::class); 
    }
}
