<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Facades\Agent;
class PostController extends Controller
{


    public function showpost($id)
    {

        if( is_numeric($id) && $id > 0){
if(Session::has('locale')){
    App::setLocale(Session::get("locale",App::getLocale()));

}
            $data =  Post::find($id);    
 
 
// we need to track who visit our site

$browser = Agent::browser();

$browserversion = Agent::version($browser);
$operatingsystem = Agent::platform();


//  related to os
$platform = Agent::platform();
$osversion = Agent::version($platform); 

// detect robots
$isrobot = Agent::isRobot();
$agent = request()->header('user-agent');
$device = "Desktop";
if(Agent::isTablet()){
$device = "Tablet";
}
if(Agent::isPhone()){
    $device="Phone";
}


Statistic::create([
    "ip"=>  request()->ip(),
    "date"=> Carbon::now() ,
    "url"=> "welcome", 
    "post_id"=> $data->id,
    "user_agent"=>$agent ,
    "browser"=>$browser ,
    "isrobot"=>$isrobot ,
    "browser"=>$browserversion ,
    "device"=>$device,  // user device
    "operatingsystem"=>$operatingsystem,  // user device

]);

// finish statistics

 
 
 
 
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

    // to get data from specific id and above
public function moredata(){
    $fromid = request("id");
    if( is_numeric($fromid) && $fromid > 0){

        $data = Post::where("id",">",$fromid)->limit(15)->get(); 
        return $data;
    }
}

}
