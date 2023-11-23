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
    $path="null";
    if ($request->hasFile('image') && request("img") != null ) {
           $location = '/images';
            if ($request->file('image')->isValid()) {
                            $path = $request->file('image')->store($location, 'public');
                        }
                    }    
    $post = new Post();
    
    $post->img = $path;
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
