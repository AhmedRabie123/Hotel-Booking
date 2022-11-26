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

  public function forget_password_submit(Request $request)
  {
    $request->validate([
      'email' => 'required|email'
    ]);

    $admin_data = Admin::where('email', $request->email)->first();
    if (!$admin_data) {
      return redirect()->back()->with('error', 'E-Mail Address Not Found!');
    }

    $token = hash('sha256', time());

    $admin_data->token = $token;
    $admin_data->update();

    $reset_link = url('admin/reset-password/'.$token. '/'.$request->email);
    $subject = 'Reset Password';
    $message = 'Please Click In The Follow Link <br>';
    $message .= '<a href= "'.$reset_link.'">Click Here</a>';

    \Mail::to($request->email)->send(new Websitemail($subject, $message));

    return redirect()->route('admin_login')->with('success', 'Please Check Your Email And Follow The Steps There');

  }

  public function reset_password($token, $email)
  {
      $admin_data = Admin::where('token', $token)->where('email', $email)->first();
      if(!$admin_data){
        return redirect()->route('admin_login');
      }

      return view('Admin.reset_password', compact('token', 'email'));
  }

  public function reset_password_submit(Request $request)
  {
     $request->validate([
        'password' => 'required',
        'retype_password' => 'required|same:password'
     ]);

     $admin_data = Admin::where('email', $request->email)->where('token', $request->token)->first();
     $admin_data->password = Hash::make($request->password);
     $admin_data->token = '';
     $admin_data->update();

     return redirect()->route('admin_login')->with('Success', 'Password Is Updated Successfully');
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

    if (Auth::guard('admin')->attempt($credentials)) {
      return redirect()->route('admin_home')->with('success', 'You Are Logged In Successfully');
    } else {
      return redirect()->route('admin_login')->with('error', 'This Is Information Is Not Correct');
    }
  }

  public function admin_logout()
  {

    Auth::guard('admin')->logout();

    return redirect()->route('admin_login')->with('success', 'You Are Logged Out Successfully');
  }
}
