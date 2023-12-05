<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Facades\Agent;
class MainController extends Controller
{
    //
    function home(Request $request){
        if(Session::has("locale")){
            App::setLocale(Session::get("locale",App::getLocale()));
        }
// we need to track who visit our site

$browser = Agent::browser();

$browserversion = Agent::version($browser);
$operatingsystem = Agent::platform();


//  related to os
$platform = Agent::platform();
$osversion = Agent::version($platform); 

// detect robots
$isrobot = Agent::isRobot();
$agent = $request->header('user-agent');
$device = "Desktop";
if(Agent::isTablet()){
$device = "Tablet";
}
if(Agent::isPhone()){
    $device="Phone";
}


Statistic::create([
    "ip"=>  $request->ip(),
    "date"=> Carbon::now() ,
    "url"=> "welcome", 
    "post_id"=> "0",
    "user_agent"=>$agent ,
    "browser"=>$browser ,
    "isrobot"=>$isrobot ,
    "browser"=>$browserversion ,
    "device"=>$device,  // user device
    "operatingsystem"=>$operatingsystem,  // user device

]);

// finish statistics


        return view("welcome");
    }
    
    function about(){
        if(Session::has("locale")){
            App::setLocale(Session::get("locale",App::getLocale()));
        }
        
        return view("about");
    }
    
}
