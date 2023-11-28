<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    //
// to translate to specifif clang 
    public function translate(){
        $lang = request("lang");
        App::setLocale($lang);
        session()->put('locale', $lang);
        return true;
    }

    
}
