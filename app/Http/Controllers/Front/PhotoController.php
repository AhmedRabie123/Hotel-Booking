<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(16);
        return view('Front.photo_gallery', compact('photos'));
    }
}
