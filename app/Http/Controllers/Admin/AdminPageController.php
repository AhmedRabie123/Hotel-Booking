<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_about', compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->about_heading = $request->about_heading;
        $page_data->about_content = $request->about_content;
        $page_data->about_status = $request->about_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'About Page Updated Successfully');

    }
}
