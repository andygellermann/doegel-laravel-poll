<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home(){
        return view('welcome',
            [
                'a'=>'myvalue',
                'b'=>'thisvalue'
            ]
        );
    }
    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
}
