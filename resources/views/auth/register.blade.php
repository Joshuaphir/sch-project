@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-2">
        <div class="mx-auto max-w-md">

            <div class="rounded shadow bg-yellow-700">
                <div class="border-b py-4 font-bold text-white text-center text-xl tracking-widest uppercase">
                    REGISTRATION
                </div>

                <form class="bg-grey-lightest px-10 py-5" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input class="border w-full p-2" name="email" type="text" placeholder="e-mail" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input class="border w-full p-2" name="username" type="text" placeholder="username" value="{{ old('username') }}" autocomplete="email" autofocus>
                        @error('username')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <select id="class" name="class" class="border w-full p-2"  autocomplete="class" autofocus>
                            <option selected value="form one">form one</option>
                            <option  value="form two">form two</option>
                            <option  value="form three">form three</option>
                            <option  value="form four">form four</option>
                        </select>
                        @error('class')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input class="border w-full p-2" name="password" type="password" placeholder="password" autocomplete="current-password">
                        @error('password')
                            <div class=" flex my-2 bg-white text-red-500 p-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-2" name="password_confirmation" id="password-confirm" type="password" placeholder="comfim password" autocomplete="new-password">
                    </div>
                    <div class="flex">
                        <button type="submit" class="text-sm uppercase w-full p-2 text-white md:ring-1 md:ring-white md:ring-offset-1 md:ring-offset-gray-100 bg-yellow-700 border-2 border-blue-300 md:rounded-lg md:baseline font-bold tracking-wider">
                            Register
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <a href="#" class="font-bold text-white hover:text-primary-dark no-underline">Don't have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
