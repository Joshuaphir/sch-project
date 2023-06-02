@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-2">
        <div class="mx-auto max-w-lg">

            <div class="rounded shadow bg-yellow-700">
                <div class="border-b py-4 font-bold text-white text-center text-xl tracking-widest uppercase">
                    CREATE POST
                </div>

                <form class="bg-grey-lightest px-10 py-2" action="/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <select id="class" name="class" class="border w-full p-2"  autocomplete="class" autofocus>
                            <option selected value="{{ $class }}">{{ $class }}</option>
                        </select>
                        @error('class')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <input class="border w-full p-2" name="title" type="text" placeholder="post title" value="{{ old('title') }}" autocomplete="text" autofocus>
                        @error('title')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                         <textarea id="description" rows="3" class="border w-full p-2" name="description" placeholder="post body" autocomplete="description" autofocus>{{ old('description') }}</textarea>

                        @error('description')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <input class="border w-full p-2" name="subject" type="text" placeholder="subject" value="{{ old('subject') }}" autocomplete="subject">
                        @error('subject')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <input class="w-full p-2 md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-white border-2 border-blue-300 md:rounded-lg md:baseline font-bold  p-2" name="image" type="file" placeholder="file" autocomplete="image">
                        @error('image')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2 py-4 mt-3">
                        <button type="submit" class="text-sm uppercase w-1/2 p-2 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline font-bold tracking-wider">
                            create
                        </button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>

@endsection
