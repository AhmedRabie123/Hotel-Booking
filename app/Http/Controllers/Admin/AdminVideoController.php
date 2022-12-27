<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('admin.video_view', compact('videos'));
    }

    public function video_create()
    {
        return view('admin.video_create');
    }

    public function video_store(Request $request)
    {
        $request->validate([
            'video_id' => 'required'
        ]);

        $video = new Video();

        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->save();

        return redirect()->route('admin_video_view')->with('success', 'Video Saved Successfully');
    }

    public function video_edit($id)
    {
        $video_single = Video::where('id', $id)->first();
        return view('admin.video_edit', compact('video_single'));
    }

    public function video_update(Request $request, $id)
    {
        $video = Video::where('id', $id)->first();


        $request->validate([
            'video_id' => 'required'
        ]);


        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->update();

        return redirect()->route('admin_video_view')->with('success', 'Video Updated Successfully');
    }

    public function video_delete($id)
    {
        $video_single = video::where('id', $id)->first();
        $video_single->delete();

        return redirect()->route('admin_video_view')->with('success', 'Video Deleted Successfully');
    }
}
