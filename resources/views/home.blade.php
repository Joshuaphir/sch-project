@extends('layouts.app')

@section('content')
    <section id="importance" class="md:mx-10 mx-10 md:bg-green-500">
        <div class="container flex flex-col  md:flex-row iterm-center px-6 mt-2 space-y-0 md:space-y-0">
            <div class="flex flex-col md:w-1/2 p-3 md:border md:border-white md:border-2 lg:rounded-full md:bg-indigo-800">
                <h1 class="max-w-sm md:mb-4 md:mt-8 break-words md:text-2xl bg-indigo-50 rounded-lg font-bold mb-8 mx-auto text-center shadow  p-3 px-6 md:text-left">
                    Latest uploads
                </h1>

                <div class="flex flex-col space-y-3 md:text-white max-w-md mx-auto p-3">
                    <ol class="list-decimal px-4">
                        @foreach($post as $postitem)
                        <li>
                            <div class="flex flex-row">
                                <p class="max-w-sm font-sans text-left md:pt-1 pt-2 inline-block text-dark md:text-left">
                                <a href="/update-post/{{ $postitem->id }}"></a>{{$postitem->description}} [ <i class="underline">{{$postitem->subject}} -<a href="/edit-post/{{ $postitem->id }}">edit</a></i>]
                                <small>By {{$postitem->user->username}}</small>
                                </p>
                            </div>  
                        </li>
                        @endforeach
                    </ol>
                    <a href="{{ route('login') }}" class="p-1 md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 w-1/2 text-center mx-auto md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">view more</a>
                      
                </div>
            </div>

            <div class="flex flex-col space-y-0  md:w-1/2 p-4">
                <h1 class="max-w-sm md:mb-6 md:mt-8 break-words md:text-2xl bg-indigo-50 rounded-lg font-bold mb-8 mx-auto text-center shadow  p-3 px-6 md:text-left">
                    Most recent posts
                </h1>
                <div class="flex flex-col space-y-3 md:text-white max-w-md mx-auto">
                    <ul class="list-disc px-4">
                        @foreach($post as $postitem)
                        <li>
                            <div class="flex flex-row">
                                <p class="max-w-sm font-sans text-left md:pt-1 pt-2 inline-block text-dark md:text-left">
                                {{$postitem->description}} [ <i class="underline">{{$postitem->subject}} </i>]
                                <small>By {{$postitem->user->username}}</small>
                                </p>
                            </div>  
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('login') }}" class="p-1 md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 w-1/2 text-center mx-auto md:ring-offset-gray-100 bg-red-500 border-2 border-blue-300 md:rounded-lg md:baseline">view more</a>
                      
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container flex flex-col  md:flex-row iterm-center px-6 md:mt-10 mt-6 mx-10 space-y-0 md:space-y-0">
            <div class="flex flex-col md:w-1/2 mb-6">
                <h1 class="max-w-md md:mb-6 mt-4  text-2xl bg-indigo-50 rounded-lg font-bold mb-4 mx-auto text-center shadow p-3 px-6 md:text-left">
                    person details
                </h1>

                <table class="table-auto border">
                    <tbody>
                        <tr class="border">
                            <td class="border">he</td>
                            <td class="border">he</td>
                            <td class="border">he</td>
                        </tr>
                        <tr >
                            <td class="border">che</td>
                            <td class="border">che</td>
                            <td class="border">che</td>
                        </tr>
                    </tbody>
                    <tfoot> view more</tfoot>
                    
                </table>
            </div>

            <div class="flex flex-col md:w-1/2 m-3 bg-gray-100 shadow-md m-6">
                <h1 class="max-w-sm md:mb-4 md:mt-8 mt-4 shadow-inner break-words md:text-2xl bg-indigo-50 rounded-lg font-bold mb-4 mx-auto text-center shadow  p-3 px-6 md:text-left">
                    Latest notifications
                </h1>
    
                <div class="flex flex-col space-y-3 px-4 p-2 max-w-md mx-auto">
                    <ul class="list-disc px-4">
                        @foreach($post as $postitem)
                        <li>
                            <div class="flex flex-row">
                                <p class="max-w-sm font-sans text-left md:pt-1 pt-2 inline-block text-dark md:text-left">
                                <a href="/show-details/{{ $postitem->id }}">{{$postitem->title}}</a> [ <i class="underline">{{$postitem->subject}} </i>]
                                <small>By {{$postitem->user->username}}</small>
                                </p>
                            </div>  
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('login') }}" class="p-1 md:block md:px-4 text-white md:ring-1 md:ring-white md:ring-offset-1 w-1/2 text-center mx-auto md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline">view more</a>
                      
                </div>
                    
            </div>
        </div>
    </section>
    <footer>
        <div class="container flex-row iterm-center px-6 mt-6 mx-auto md:mt-10 w-full">
            <p class="text-center bg-indigo-800 text-white md:pt-4  p-3 px-6 text-dark">
                logged in user: {{ Auth::user()->username }}
            </p> 
        </div>
    </footer>
@endsection