<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //function for displaying post
   /* public function index(){
        $post = \App\Models\Post::all();
        return view('posts.index',compact('post'));
    }*/


    //function for displaying post
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

        return view('posts.display',compact('post'));
    }

    //function for viewing post details
    public function show($id){
        $show = \App\Models\Post::find($id);
        return view('posts.show',compact('show'));
    }

    public function show_search(){
        $searchPg = "search";
        return view('posts.index',['search'=>$searchPg,]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    //function for downloading files
    public function download($file){
        $path = public_path($file);
        $filename = $file;
        return Response::download($path,$filename,['Content-Type: application/document']);
    }
    
    public function create(){
    	//$class = auth()->user()->class;
    	$class = auth()->user()->class;
        $subject = \App\Models\Subject::all();
    	return view('posts.create',['class'=>$class,]);
    }

    public function show_details(\App\Models\Post $post){
        return view('posts.show-details', compact('post'));
    }

    public function edit_post(\App\Models\Post $post){
        return view('posts.edit-post', compact('post'));
    }

    public function store(){
    	$data = request()->validate([
    		'class' => 'required',
    		'title' => 'required',
    		'description' => 'required',
    		'subject' => 'required',
    		'image' => '',
    	]);
        if(request('image') != ''){
        	$filepath = request('image')->store('uploads','public');
        	auth()->user()->posts()->create([
                'class'=>$data['class'],
                'title'=>$data['title'],
                'description'=>$data['description'],
                'subject'=>$data['subject'],
                'image'=>$filepath,

            ]);
        }else{
            auth()->user()->posts()->create([
                'class'=>$data['class'],
                'title'=>$data['title'],
                'description'=>$data['description'],
                'subject'=>$data['subject'],
                'image'=>'',

            ]);
        }

    	//return redirect()->with('sucess','posted sucessfully');
    }

    
    public function update_post(Request $request, $update){
        $post = \App\Models\Post::find($update);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->subject = $request->input('subject');
        $post->image = $request->input('image');
        $post->update();
        return redirect('/');
    }

    public function search(Request $request){

        if(isset($_GET['query'])){
            $query = $_GET['query'];
            $data = \App\Models\Post::where('subject','Like','%'.$query.'%')->orWhere('title','Like','%'.$query.'%')->orWhere('description','Like','%'.$query.'%')->orWhere('class','Like','%'.$query.'%')->paginate(3);
            $data->appends($request->all());
        
            return view('posts.index',['data'=>$data]);
        }
    }
}
