<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,edit-profile'],
            'email' => ['required', 'email', 'unique:users,email,'.auth()->user()->id]
        ]);

        if($request->image){
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');

            $nameImage = Str::uuid() . "." . $image->extension();

            $serverImage = $manager->read($image);
            $serverImage->cover(1000, 1000);

            $imagePath = public_path('profiles') . '/' . $nameImage;
            $serverImage->save($imagePath);
        }

        $user = User::find(auth()->user()->id);

        if($request->current_password) {
            $validated = $request->validate([
                'current_password' => 'required|current_password',
                'new_password' => 'required|min:6'
            ]);
            $user->password = Hash::make($validated['new_password']);
        }

        //Save Changes
        $user->username = $request->username;
        $user->image = $nameImage ?? auth()->user()->image ?? null;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
