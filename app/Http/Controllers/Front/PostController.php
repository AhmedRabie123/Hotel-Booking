<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('Front.blog', compact('posts'));
    }

    public function detail($id)
    {
       $post_detail = Post::where('id', $id)->first();
       $post_detail->total_view = $post_detail->total_view + 1;
       $post_detail->update();
       return view('Front.blog_detail', compact('post_detail'));
    }
}
