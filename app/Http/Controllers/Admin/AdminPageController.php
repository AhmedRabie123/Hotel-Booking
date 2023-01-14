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

    public function photo_gallery()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_photo_gallery', compact('page_data'));
    }

    public function photo_gallery_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->photo_gallery_heading = $request->photo_gallery_heading;
        $page_data->photo_gallery_status = $request->photo_gallery_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Photo Gallery Page Updated Successfully');

    }

    public function video_gallery()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_video_gallery', compact('page_data'));
    }

    public function video_gallery_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->video_gallery_heading = $request->video_gallery_heading;
        $page_data->video_gallery_status = $request->video_gallery_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Video Gallery Page Updated Successfully');

    }

     public function faq()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_faq', compact('page_data'));
    }

    public function faq_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->faq_heading = $request->faq_heading;
        $page_data->faq_status = $request->faq_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'FAQ Page Updated Successfully');

    }

    public function blog()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_blog', compact('page_data'));
    }

    public function blog_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->blog_heading = $request->blog_heading;
        $page_data->blog_status = $request->blog_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Blog Page Updated Successfully');

    }

    public function room()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_room', compact('page_data'));
    }

    public function room_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->room_heading = $request->room_heading;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Room Page Updated Successfully');

    }

    public function cart()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_cart', compact('page_data'));
    }

    public function cart_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->cart_heading = $request->cart_heading;
        $page_data->cart_status = $request->cart_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Cart Page Updated Successfully');

    }

    public function checkout()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_checkout', compact('page_data'));
    }

    public function checkout_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->checkout_heading = $request->checkout_heading;
        $page_data->checkout_status = $request->checkout_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Checkout Page Updated Successfully');

    }

    public function payment()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_payment', compact('page_data'));
    }

    public function payment_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->payment_heading = $request->payment_heading;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Payment Page Updated Successfully');

    }

       public function signup()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_signup', compact('page_data'));
    }

    public function signup_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->signup_heading = $request->signup_heading;
        $page_data->signup_status = $request->signup_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Sign Up Page Updated Successfully');

    }

    public function signin()
    {
        $page_data = Page::where('id', 1)->first();
        return view('Admin.page_signin', compact('page_data'));
    }

    public function signin_update(Request $request)
    {
        $page_data = Page::where('id', 1)->first();

        $page_data->signin_heading = $request->signin_heading;
        $page_data->signin_status = $request->signin_status;
        $page_data->update();

        return redirect()->route('admin_home')->with('success', 'Sign In Page Updated Successfully');

    }

}
