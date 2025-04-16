@extends('layouts.app')

@section('titulo')
    Sign Up
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img class="rounded-lg" src="{{asset('img/registrar.jpg')}}" alt="sign up image">
        </div>

        <div class="bg-white rounded-lg p-6 shadow-xl md:w-4/12">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text"
                        placeholder="Your Name" 
                        value="{{old('name')}}"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                    />
                    @error('name')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username" 
                        name="username" 
                        type="text"
                        placeholder="Your Username"
                        value="{{old('username')}}"
                        class="border p-3 w-full rounded-lg @error('username')
                            border-red-500
                        @enderror"
                    />
                    @error('username')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Confirm Password
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repeat Your Password" 
                        class="border p-3 w-full rounded-lg"
                    />
                </div>

                <input
                    type="submit"
                    value="Create Account"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection