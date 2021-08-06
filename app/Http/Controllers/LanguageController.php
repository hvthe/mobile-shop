<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class LanguageController extends Controller
{
    public function changeLanguage($language)
    {
        if(App::currentLocale() != $language){
            session()->put('language', $language);
        }
        return redirect()->back();
    }
}
