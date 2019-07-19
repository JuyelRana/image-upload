<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        $images = Image::all();
        return view('welcome', compact('images'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable|image'
        ]);

        $image = new Image();
        $image->title = $request->title;

        if ($request->hasFile('image')) {
            //store
            $image->image = $request->image->store('public/images');  // Store image to images folder
        }

        $image->save();

        return redirect()->route('create');
    }
}
