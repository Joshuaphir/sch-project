@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-2">
        <div class="mx-auto max-w-sm">

            <div class="rounded shadow bg-yellow-700">
                <div class="border-b py-8 font-bold text-white text-center text-xl tracking-widest uppercase">
                    Welcome back!
                </div>

                <form class="bg-grey-lightest px-10 py-10" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <input class="border w-full p-3 @error('email') border-red-500 @enderror" name="email" type="text" placeholder="e-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <input class="border w-full p-3 @error('password') border-red-500 @enderror" name="password" type="password" placeholder="**************" required autocomplete="current-password">
                    </div>
                    <div class="flex">
                        <button type="submit" class="text-sm uppercase w-full p-2 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline font-bold tracking-wider">
                            Login
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <a href="#" class="font-bold text-white hover:text-primary-dark no-underline">Don't have an account?</a>
                        <a href="#" class="text-white hover:text-black no-underline">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
