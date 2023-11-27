<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    //

    public function english(){
        App::setLocale("en");
        session()->put('locale', "en");
        
        return true;
    }
    public function arabic(){
        App::setLocale("ar");
        session()->put('locale', "ar");
        

        return true;
    }


    public function kurdish(){
        App::setLocale("kr");
        session()->put('locale', "kr");
        

        return true;
    }

}
