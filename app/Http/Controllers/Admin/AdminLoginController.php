<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;
use Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AdminLoginController extends Controller
{
    public function index()
    {

        // $pass = Hash::make('1234');
        // dd($pass);

        return view('Admin.login');

    }

    public function forget_password()
    {
        return view('Admin.forget_password');
    }

    public function login_submit(Request $request)
    {
          $request->validate([
             'email' => 'required|email',
             'password' => 'required'
          ]);

          $credentials = [
             'email' => $request->email,
             'password' => $request->password
          ];

          if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin_home')->with('success', 'You Are Logged In Successfully');
          }else{
            return redirect()->route('admin_login')->with('error', 'This Is Information Is Not Correct');
          }
    }

    public function admin_logout(){

        Auth::guard('admin')->logout();

        return redirect()->route('admin_login')->with('success', 'You Are Logged Out Successfully');
    }
}
