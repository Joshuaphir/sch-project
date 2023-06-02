<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //function for saving comment
    public function store(Request $request){
    	$input = $request->all();
    	$request->validate([
    		'body'=>'required',
    	]);

    	$input['user_id'] = auth()->user()->id;
    	\App\Models\Comment::create($input);

    	return back();

    }

    
}
