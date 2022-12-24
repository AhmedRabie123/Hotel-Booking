<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $features = Feature::get();
        $testimonials = Testimonial::get();
        return view('Front.home', compact('slider', 'features', 'testimonials'));
    }
}
