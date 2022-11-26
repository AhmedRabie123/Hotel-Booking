<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;

class AdminProfileController extends Controller
{
    public function admin_profile()
    {
        return view('Admin.profile');
    }

    public function profile_submit(Request $request)
    {

        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        //dd($admin_data);


        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);

            $admin_data->password = Hash::make($request->password);
            // dd($request->password);
        }


        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg,svg,gif'
            ]);

            if (file_exists(public_path('uploads/' . $admin_data->photo)) && $admin_data->photo != NULL) {
                unlink(public_path('uploads/' . $admin_data->photo));
            }

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'admin_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $admin_data->photo = $final_name;
        }



        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->route('admin_home')->with('success', 'Profile Updated Successfully.');
    }
}
