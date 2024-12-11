<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadForm()
    {
        $images = Image::all();

        return view('upload_image.upload-image', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('upload', 'public');
                Image::create([
                    'file_path' => $path
                ]);
            }
        }
        return back()->with('success', 'Images uploaded successfully');
    }
}
