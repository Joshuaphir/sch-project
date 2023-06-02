@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-2">
    	<div class="flex flex-row">
    		<div class="invisible w-1/2">
    			
    		</div>
    		<div class="flex flex-row space-x-6 w-1/2">
    			<a href="/create-post" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-blue-500 border-2 border-red-300 md:rounded-lg md:baseline">add post</a>
    			<a href="{{ route('show_search')}}" class="p-1 hidden md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-blue-500 border-2 border-red-300 md:rounded-lg md:baseline">search post</a>
    		</div>

    	</div>
        <div class="mx-auto max-w-lg">
        	<ol class="list-decimal">
           		@foreach($post as $item)
            		<li class="mb-2"><p><a class="text-blue-500" href="show-post/{{ $item->id }}">{{ $item->title }}</a> <small class="text-red-500">{{$item->subject}}</small> posted by [{{$item->user->username }}]</p></li>
            	@endforeach
        	</ol>
            
        </div>
    </div>

@endsection