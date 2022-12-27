<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $features = Feature::limit(8)->get();
        $testimonials = Testimonial::get();
        $posts = Post::orderBy('id','desc')->limit(3)->get();
        return view('Front.home', compact('slider', 'features', 'testimonials', 'posts'));
    }
}
