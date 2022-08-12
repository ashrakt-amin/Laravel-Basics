<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('userName')) {
    function userName() {
       return Auth::user()->name ;
    }
}