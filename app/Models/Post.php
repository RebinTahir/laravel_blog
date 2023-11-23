<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $appends =["title","body"];
public function getTitleAttribute(){
    $lang = "title_".config("app.locale");
    return $this->$lang;
}
public function getBodyAttribute(){
    $lang = "body_".config("app.locale");
    return $this->$lang;
}

}
