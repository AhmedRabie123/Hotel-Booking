<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        return view('Front.home', compact('slider'));
    }
}
