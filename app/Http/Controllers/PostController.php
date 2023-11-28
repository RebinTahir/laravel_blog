<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{


    public function showpost($id)
    {

        if( is_numeric($id) && $id > 0){
if(Session::has('locale')){
    App::setLocale(Session::get("locale",App::getLocale()));

}
            $data =  Post::find($id);    
            return view("sections.subject",compact("data"));
        }
        return abort(404); 

        
    }

    // save post
    public function savepost(Request $request)
    {
        $path = "";
        if ($request->hasFile('img') && request("img") != null) {
            $location = '/images';
            if ($request->file('img')->isValid()) {
                $path = $request->file('img')->store($location, 'public');
            }
        }


        if (request("update") && request("id") > 0) {
            $post = Post::find(request("id"));
        } else {
            $post = new Post();
        }

        if (strlen($path)  > 1) {
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

        if ($post->save()) {
            return [true, true];
        } else {
            return [false, false];
        }
    }

    // to get posts based on dates
    public function getposts()
    {
        $sdate = request("sdate");
        $edate = request("edate");
        $posts = Post::whereBetween("created_at", [$sdate, $edate]);

        return \Yajra\DataTables\DataTables::of($posts)->make(true);
    }


    public function deletepost()
    {
        $data = Post::find(request("id"));

        if (!is_null($data)) {
            if ($data->delete()) {
                return [true, true];
            }
        } else {
            return [false, false];
        }
    }
}
