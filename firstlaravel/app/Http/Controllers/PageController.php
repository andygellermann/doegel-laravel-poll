<?php

namespace App\Http\Controllers;

use http\Env\Request;

class PageController extends Controller
{
    public function home(){
        return view('home',
            [
                'lorem'=>'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
                'ipsum'=>request('title')
            ]
        );
    }
    public function contact(){
        return view('contact');
    }
    public function send(){

        return view('send',[
            'result'=>request('pw')
        ]);
    }
    public function about(){
        return view('about');
    }
}
