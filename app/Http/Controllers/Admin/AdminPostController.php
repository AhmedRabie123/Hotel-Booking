<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.post_view', compact('posts'));
    }

    public function post_create()
    {
        return view('admin.post_create');
    }

    public function post_store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required'

        ]);

        $post = new Post();

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'post_' . $now . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $post->photo = $final_name;


        $post->heading = $request->heading;
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->total_view = 1;
        $post->save();

        return redirect()->route('admin_post_view')->with('success', 'Post Saved Successfully');
    }

    public function post_edit($id)
    {
        $post_single = Post::where('id', $id)->first();
        return view('admin.post_edit', compact('post_single'));
    }

    public function post_update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            unlink(public_path('uploads/' . $post->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'post_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $post->photo = $final_name;
        }

        $post->heading = $request->heading;
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->update();

        return redirect()->route('admin_post_view')->with('success', 'Post Updated Successfully');
    }

    public function post_delete($id)
    {
        $post_single = post::where('id', $id)->first();

        unlink(public_path('uploads/' . $post_single->photo));
        $post_single->delete();
        return redirect()->route('admin_post_view')->with('success', 'Post Deleted Successfully');
    }


}
