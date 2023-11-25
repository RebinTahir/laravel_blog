<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    

    public function showpost($id){
        
        // $data =  Post::find($id);    
        // return view("sections.subject",compact("data"));

return view("sections.subject");
    }

    // save post
public function savepost(Request $request){
    $path=null;
    if ($request->hasFile('image') && request("img") != null ) {
           $location = '/images';
            if ($request->file('image')->isValid()) {
                            $path = $request->file('image')->store($location, 'public');
                        }
                    }    
    
    
                    if(request("update") && request("id") > 0 ){
        $post = Post::find(request("id"));
    }else{
        $post = new Post();
    }
    

    if(!is_null($path)){
        $post->img = $path;

    }


    $post->title_en = request("titleen");
    $post->title_kr = request("titlekr");
    $post->title_ar = request("titlear");
    
    $post->body_en = request("bodyen");
    $post->body_kr = request("bodykr");
    $post->body_ar = request("bodyar");
    
    $post->youtube = request("youtube");
    $post->note = request("note");

   if($post->save()){
       return [true,true];
    } else{
       return [false,false];

   }

}

// to get posts based on dates
public function getposts()  {
    $sdate = request("sdate");
    $edate = request("edate");
    $posts = Post::whereBetween("created_at",[$sdate,$edate])->get();
    return $posts;

}


public function deletepost(){
    $data = Post::find(request("id"));

        if(!is_null($data)){
if($data->delete()){
    return [true,true];
}

        }        else{
            return [false,false];
        
        }
}

}
