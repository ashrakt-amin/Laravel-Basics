<?php 
namespace App\Traits;

trait TestTrait{

    public function getData($model){
     return $model::all();

    }
}