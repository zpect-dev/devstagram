@extends('layouts.app')

@section('titulo')
    Edit Profile: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{route('profile.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username" 
                        name="username" 
                        type="text"
                        placeholder="Your Username" 
                        value="{{auth()->user()->username}}"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                    />
                    @error('username')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-500 font-bold">
                        Profile Image
                    </label>
                    <input 
                        id="image" 
                        name="image" 
                        type="file"
                        value=""
                        class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png"
                    />
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email"
                        placeholder="Your email" 
                        value="{{auth()->user()->email}}"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                    />
                    @error('email')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="current_password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Write Your Actual Password To Change It
                    </label>
                    <input 
                        id="current_password" 
                        name="current_password" 
                        type="password"
                        placeholder="Your Actual Password" 
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                    />
                    @error('current_password')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="new_password" class="mb-2 block uppercase text-gray-500 font-bold">
                        New Password
                    </label>
                    <input 
                        id="new_password" 
                        name="new_password"
                        type="password"
                        placeholder="Your New Password" 
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                    />
                    @error('new_password')
                        <p class="bg-red-500 text-center text-white rounded-lg p-2 text-sm my-2">{{$message}}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Save Changes"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
    </div>
@endsection