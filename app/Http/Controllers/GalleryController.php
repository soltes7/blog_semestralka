<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $images = Image::all();
        return view('gallery.index', [
            'images' => $images
        ]);
    }

    public function create()
    {
        return view('gallery.create', [
            'action' => route('image.store'),
            'method' => 'post'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required'
        ]);

        $image = Image::create($request->all());
        $image->save();
        return redirect()->route('image.index');
    }

    public function delete(Image $image)
    {
        $image->delete();
        return redirect()->route('image.index');
    }

    public function expand(Image $image)
    {
        $image->incrementTimes();
        return view('gallery.expand', [
            'image' => $image,
        ]);
    }
}
