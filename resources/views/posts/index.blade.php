@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="flex">
            <form method="get" action="/search-post" class="max-w-lg">
                <div class="flex flex-row mx-4 p-2">
                    <div class="mb-2">
                        <input class="p-2 border m-3" type="text" name="query">
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="text-sm p-2 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">
                        search
                        </button>  
                    </div>
                </div>
                  
            </form>       
                
        </div>
    </div>
        
    <div class="container mx-auto p-2">
        <div class="mx-auto max-w-lg">
            <div class="flex flex-col">
                
            </div>
            <div id="data">
                
            </div>
        </div>
        <div class="mx-auto max-w-lg">
            <div class="flex flex-col">
                @if(isset($data)) 
                    @if(count($data) > 0)
                        @foreach($data as $item)
                            <div class="flex flex-col p-2">
                                <div class="flex flex-row mx-4">
                                    <p class="text-blue-500">{{ $item->title }}</p>
                                </div>
                                <div class="ml-3">
                                    <p class="p-2">{{ $item->description }}</p>
                                </div>
                                
                            </div>
                        @endforeach
                        <p class="p-2 m-3">{{ $data}}</p>
                    @else
                        <div class="text-red-500"><h1>No data found</h1></div>
                    @endif

                    <div>
                        {{ $data->links() }}
                    </div>
                @endif 
            </div>
            
        </div>

    </div>
    

@endsection
