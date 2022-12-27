<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::get();
        return view('admin.photo_view', compact('photos'));
    }

    public function photo_create()
    {
        return view('admin.photo_create');
    }

    public function photo_store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $photo = new Photo();

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'photo_gallery_' . $now . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $photo->photo = $final_name;


        $photo->caption = $request->caption;
        $photo->save();

        return redirect()->route('admin_photo_view')->with('success', 'Photo Saved Successfully');
    }

    public function photo_edit($id)
    {
        $photo_single = Photo::where('id', $id)->first();
        return view('admin.photo_edit', compact('photo_single'));
    }

    public function photo_update(Request $request, $id)
    {
        $photo = Photo::where('id', $id)->first();

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            unlink(public_path('uploads/' . $photo->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_gallery_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $photo->photo = $final_name;
        }

        $photo->caption = $request->caption;
        $photo->update();

        return redirect()->route('admin_photo_view')->with('success', 'photo Updated Successfully');
    }

    public function photo_delete($id)
    {
        $photo_single = Photo::where('id', $id)->first();

        unlink(public_path('uploads/' . $photo_single->photo));
        $photo_single->delete();
        return redirect()->route('admin_photo_view')->with('success', 'Photo Deleted Successfully');
    }
}
