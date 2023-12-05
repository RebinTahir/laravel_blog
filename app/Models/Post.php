<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    use HasFactory;
    protected $appends =["title","body","myimg","mylink"];
public function getTitleAttribute(){
    $lang = "title_".App::getLocale();
    return $this->$lang;
}
public function getMylinkAttribute(){
    
$link = route("information",["id"=>$this->id]);
    return $link;
}


public function getBodyAttribute(){
    $lang = "body_".App::getLocale();
    
    return $this->$lang;
}




public function getMyimgAttribute()
{
    return $this->getImg();
}



public function getImg()
{
    $file = asset("storage/" . $this->img);
    return $file;
}


}
