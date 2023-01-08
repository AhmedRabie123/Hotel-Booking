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

    public function terms()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_terms', compact('page_data'));
    }

    public function terms_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->terms_heading = $request->terms_heading;
        $page_data->terms_content = $request->terms_content;
        $page_data->terms_status = $request->terms_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Terms Page Updated Successfully');

    }

    public function privacy()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_privacy', compact('page_data'));
    }

    public function privacy_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->privacy_heading = $request->privacy_heading;
        $page_data->privacy_content = $request->privacy_content;
        $page_data->privacy_status = $request->privacy_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Privacy Page Updated Successfully');

    }

    public function contact()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_contact', compact('page_data'));
    }

    public function contact_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->contact_heading = $request->contact_heading;
        $page_data->contact_map = $request->contact_map;
        $page_data->contact_status = $request->contact_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Contact Page Updated Successfully');

    }


}
