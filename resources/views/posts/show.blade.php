@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-2">
        <div class="mx-auto">
            <div class="flex flex-col">
                <h1 class="text-2xl p-3 w-1/6 shadow mx-4">{{ $show->user->username }}'s post</h1>
                <div class="flex flex-col mx-2 p-2 mb-2">
                    <div class="flex flex-row mx-4">
                        <p class="text-2xl text-blue-500 mb-2">{{ $show->title }}</p>
                    </div>
                    
                    <p class="p-2 ml-3 text-1xl word-break">{{ $show->description }}</p> 
                </div>
                <!--div class="m-2">
                    <form method="get" action="/storage/{{ $show->image }}"  role="form">
                        {{ csrf_field() }}
                        <input type="hidden" placeholder="{{ $show->image}}" >
                        <button class="p-2 m-2 border bg-blue-500 text-white w-1/4" type="submit">view file</button>
                    </form>
                </div-->
                <div class="w-1/8 ml-7 mb-2">
                    <a href="/edit-post/{{ $show->id }}" class="p-1 md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-blue-500 border-2 border-red-300 md:rounded-lg w-1/8">edit</a>
                </div>
                <div class="flex flex-col md:ml-5">
                    <h2 class="text-1xl">comments</h2>
                    @include('posts.comments',['comments'=>$show->comments, 'post_id'=>$show->id])
                </div>
                <h4 class="p-2 md:ml-5">add comment</h4>
                <form method="post" action="/comment-store">
                    @csrf
                    <div class="flex flex-col ml-5 mb-4">
                        <div>
                            <input class="p-3 border m-3" type="text" name="body">
                            <input type="hidden" name="post_id" value="{{ $show->id }}" />
                        </div>
                        <div class="ml-4">
                            <button type="submit" class="text-sm w-1/4 p-2 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">
                            comment
                            </button>  
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

@endsection
