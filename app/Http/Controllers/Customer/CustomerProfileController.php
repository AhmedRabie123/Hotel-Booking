<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Hash;

class CustomerProfileController extends Controller
{
    public function customer_profile()
    {
        return view('customer.profile');
    }

    public function profile_submit(Request $request)
    {

        $customer_data = Customer::where('email', Auth::guard('customer')->user()->email)->first();
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

            $customer_data->password = Hash::make($request->password);
            // dd($request->password);
        }


        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'image|mimes:jpg,png,jpeg,svg,gif'
            ]);

            if (file_exists(public_path('uploads/' . $customer_data->photo)) && $customer_data->photo != NULL) {
                unlink(public_path('uploads/' . $customer_data->photo));
            }

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'customer_' . $now . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $customer_data->photo = $final_name;
        }



        $customer_data->name = $request->name;
        $customer_data->email = $request->email;
        $customer_data->phone = $request->phone;
        $customer_data->country = $request->country;
        $customer_data->address = $request->address;
        $customer_data->state = $request->state;
        $customer_data->city = $request->city;
        $customer_data->zip = $request->zip;
        $customer_data->update();

        return redirect()->route('customer_home')->with('success', 'Profile Updated Successfully.');
    }
}
