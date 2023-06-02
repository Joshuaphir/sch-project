<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $class = auth()->user()->class;
        $jce = array("form one", "form two");
        $msce = array("form three", "form four");

        if(in_array($class, $jce)){
            $post = \App\Models\Post::where('class','Like','%form one%')->orWhere('class','Like','%form two%')->get();
        } elseif (in_array($class, $msce)) {
            $post = \App\Models\Post::where('class','Like','%$form three%')->orWhere('class','Like','%form four%')->get();
        } else {
            $post = \App\Models\Post::where('class','Like','%'.$class.'%')->get();
        }

        return view('home',['post'=>$post,]);
    }
}
