<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

use function Ramsey\Uuid\v1;

class AdminSlideController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.slide_view', compact('sliders'));
    }

    public function slide_create()
    {
        return view('admin.slide_create');
    }

    public function slide_store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $slide = new Slider();

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'slide_' . $now . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $slide->photo = $final_name;


        $slide->heading = $request->heading;
        $slide->text = $request->text;
        $slide->button_text = $request->button_text;
        $slide->button_url = $request->button_url;
        $slide->save();

        return redirect()->route('admin_slide_view')->with('success', 'Slider Saved Successfully');
    }

    public function slide_edit($id)
    {
        $slide_single = Slider::where('id', $id)->first();
        return view('admin.slide_edit', compact('slide_single'));
    }

    public function slide_update(Request $request, $id)
    {
        $slider = Slider::where('id', $id)->first();

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            unlink(public_path('uploads/' . $slider->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'slide_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $slider->photo = $final_name;
        }

        $slider->heading = $request->heading;
        $slider->text = $request->text;
        $slider->button_text = $request->button_text;
        $slider->button_url = $request->button_url;
        $slider->update();

        return redirect()->route('admin_slide_view')->with('success', 'Slider Updated Successfully');
    }

    public function slide_delete($id)
    {
        $slider_single = Slider::where('id', $id)->first();

        unlink(public_path('uploads/' . $slider_single->photo));
        $slider_single->delete();
        return redirect()->route('admin_slide_view')->with('success', 'Slider Deleted Successfully');
    }
}
