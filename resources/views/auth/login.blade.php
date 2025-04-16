@extends('layouts.app')

@section('titulo')
    Sign In
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img class="rounded-lg" src="{{asset('img/login.jpg')}}" alt="sign in image">
        </div>

        <div class="bg-white rounded-lg p-6 shadow-xl md:w-4/12">
            @if (session('mensaje'))
                <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{session('mensaje')}}</p>
            @endif
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Your Email"
                        value="{{old('email')}}"
                        class="border p-3 w-full rounded-lg @error('email')
                            border-red-500
                        @enderror"
                    />
                    @error('email')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Your Password" 
                        class="border p-3 w-full rounded-lg"
                    />
                    @error('password')
                        <p class="bg-red-500 text-center text-white text-sm p-2 rounded-lg my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label class="text-gray-500 text-sm">Keep session open</label>
                </div>

                <input
                    type="submit"
                    value="Log In"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection