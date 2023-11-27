<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    //
    function home(){
        if(Session::has("locale")){
            App::setLocale(Session::get("locale",App::getLocale()));
        }

        return view("welcome");
    }
    
    function about(){
        if(Session::has("locale")){
            App::setLocale(Session::get("locale",App::getLocale()));
        }
        
        return view("about");
    }
    
}
