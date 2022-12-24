<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::get();
        return view('admin.feature_view', compact('features'));
    }

    public function feature_create()
    {
        return view('admin.feature_create');
    }

    public function feature_store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required'
        ]);

        $feature = new Feature();

        $feature->icon = $request->icon;
        $feature->heading = $request->heading;
        $feature->text = $request->text;
        $feature->save();

        return redirect()->route('admin_feature_view')->with('success', 'Feature Saved Successfully');
    }

    public function feature_edit($id)
    {
        $feature_single = Feature::where('id', $id)->first();
        return view('admin.feature_edit', compact('feature_single'));
    }

    public function feature_update(Request $request, $id)
    {
        $feature = Feature::where('id', $id)->first();

            $request->validate([
                'icon' => 'required',
                'heading' => 'required'
            ]);
        

        $feature->icon = $request->icon;
        $feature->heading = $request->heading;
        $feature->text = $request->text;
        $feature->update();

        return redirect()->route('admin_feature_view')->with('success', 'Feature Updated Successfully');
    }

    public function feature_delete($id)
    {
        $feature_single = Feature::where('id', $id)->first();
        $feature_single->delete();
        return redirect()->route('admin_feature_view')->with('success', 'Feature Deleted Successfully');
    }
}
