<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial_view', compact('testimonials'));
    }

    public function testimonial_create()
    {
        return view('admin.testimonial_create');
    }

    public function testimonial_store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'

        ]);

        $testimonial = new Testimonial();

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_' . $now . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $testimonial->photo = $final_name;


        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->route('admin_testimonial_view')->with('success', 'Testimonial Saved Successfully');
    }

    public function testimonial_edit($id)
    {
        $testimonial_single = Testimonial::where('id', $id)->first();
        return view('admin.testimonial_edit', compact('testimonial_single'));
    }

    public function testimonial_update(Request $request, $id)
    {
        $testimonial = Testimonial::where('id', $id)->first();

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg,gif,svg'
            ]);

            unlink(public_path('uploads/' . $testimonial->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $testimonial->photo = $final_name;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->update();

        return redirect()->route('admin_testimonial_view')->with('success', 'Testimonial Updated Successfully');
    }

    public function testimonial_delete($id)
    {
        $testimonial_single = Testimonial::where('id', $id)->first();

        unlink(public_path('uploads/' . $testimonial_single->photo));
        $testimonial_single->delete();
        return redirect()->route('admin_testimonial_view')->with('success', 'Testimonial Deleted Successfully');
    }
}
