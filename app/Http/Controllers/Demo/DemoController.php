<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function Index(){
        return view('about');
    } // end Index method

    public function ContactMethod(){
        return view('contact');
    }

    public function homePage()
    {
        return view('frontend.index');
    }


}
