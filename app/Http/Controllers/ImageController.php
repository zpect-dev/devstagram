<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $manager = new ImageManager(new Driver());
        $image = $request->file('file');

        $nameImage = Str::uuid() . "." . $image->extension();

        $serverImage = $manager->read($image);
        $serverImage->cover(1000, 1000);

        $imagePath = public_path('uploads') . '/' . $nameImage;
        $serverImage->save($imagePath);

        return response()->json(['image' => $nameImage]);
    }
}
