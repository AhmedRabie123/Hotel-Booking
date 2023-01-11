<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::orderBy('id', 'asc')->get();
        return view('Admin.amenity_view', compact('amenities'));
    }

    public function amenity_create()
    {
        return view('admin.amenity_create');
    }

    public function amenity_store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $amenity = new Amenity();

        $amenity->name = $request->name;
        $amenity->save();

        return redirect()->route('admin_amenity_view')->with('success', 'Amenity Saved Successfully');
    }

    public function amenity_edit($id)
    {
        $amenity_single = Amenity::where('id', $id)->first();
        return view('admin.amenity_edit', compact('amenity_single'));
    }

    public function amenity_update(Request $request, $id)
    {
        $amenity = Amenity::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);


        $amenity->name = $request->name;
        $amenity->update();

        return redirect()->route('admin_amenity_view')->with('success', 'Amenity Updated Successfully');
    }

    public function amenity_delete($id)
    {
        $amenity_single = Amenity::where('id', $id)->first();
        $amenity_single->delete();

        return redirect()->route('admin_amenity_view')->with('success', 'Amenity Deleted Successfully');
    }
}
