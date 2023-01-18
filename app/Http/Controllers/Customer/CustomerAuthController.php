<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Auth;
use Hash;

class CustomerAuthController extends Controller
{
  public function login()
  {
    return view('Front.login');
  }

  public function login_submit(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $credentials = [
      'email' => $request->email,
      'password' => $request->password,
      'token' => '',
      'status' => 1
    ];

    if (Auth::guard('customer')->attempt($credentials)) {
      return redirect()->route('customer_home')->with('success', 'You Are Logged In Successfully');
    } else {
      return redirect()->route('customer_login')->with('error', 'This Is Information Is Not Correct');
    }
  }

  public function signup()
  {
    return view('Front.signup');
  }

  public function signup_submit(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:customers',
      'password' => 'required',
      'retype_password' => 'required|same:password'
    ]);

    $token = hash('sha256', time());
    $password = Hash::make($request->password);

    $verification_link = url('signup/verify/' . $request->email . '/' . $token);

    $customer = new Customer();

    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->password = $password;
    $customer->token = $token;
    $customer->status = 0;
    $customer->save();

    //Send Email

    $subject = 'SignUp Verification Link';
    $message = 'Please Click On The Link below To Confirm SignUp Process: </br>';
    $message .= '<a href="' . $verification_link . '">';
    $message .= $verification_link;
    $message .= '</a>';

    \Mail::to($request->email)->send(new Websitemail($subject, $message));

    return redirect()->back()->with('success', 'To Complete The SignUp, Please Check Your E-Mail And Click The Link');
  }

  public function signup_verify($email, $token)
  {
    $customer_data = Customer::where('email', $email)->where('token', $token)->first();

    if ($customer_data) {
      $customer_data->token = '';
      $customer_data->status = 1;
      $customer_data->update();
      return redirect()->route('customer_login')->with('success', 'Your Account Is Verified Successfully');
    } else {
      return redirect()->route('customer_login');
    }
  }

  public function customer_logout()
  {

    Auth::guard('customer')->logout();

    return redirect()->route('customer_login')->with('success', 'You Are Logged Out Successfully');
  }

  public function forget_password()
  {
    return view('Front.forget_password');
  }

  public function forget_password_submit(Request $request)
  {

    $request->validate([
      'email' => 'required|email'
    ]);

    $customer_data = Customer::where('email', $request->email)->where('status', 1)->first();

    if (!$customer_data) {
      return redirect()->back()->with('error', 'E-Mail Address Not Found');
    }

    $token = hash('sha256', time());
    $customer_data->token = $token;
    $customer_data->status = 0;
    $customer_data->update();

    //send email

    $reset_password_link = url('customer/reset-password/' . $request->email . '/' . $token);

    $subject = 'Password Reset Verification Link';
    $message = 'Please Click On The Link below To Confirm Reset Password: </br>';
    $message .= '<a href="' . $reset_password_link . '">Click Here</a>';

    \Mail::to($request->email)->send(new Websitemail($subject, $message));

    return redirect()->route('customer_login')->with('success', 'To Complete The Reset Password, Please Check Your E-Mail And Click The Link');
  }

  public function reset_password($email, $token)
  {
    $customer_data = Customer::where('email', $email)->where('token', $token)->first();

    //dd($email);

    if (!$customer_data) {
      return redirect()->route('customer_login')->with('error', 'There is an error in your information');
    } else {
      return view('Front.reset_password', compact('token', 'email'));
    }
  }

  public function reset_password_submit(Request $request)
  {
    $request->validate([
      'password' => 'required',
      'retype_password' => 'required|same:password'
    ]);

    $customer_data = Customer::where('email', $request->email)->where('token', $request->token)->first();

    //dd($customer_data);

    $password = Hash::make($request->password);
    $customer_data->password = $password;
    $customer_data->token = '';
    $customer_data->status = 1;
    $customer_data->update();

    return redirect()->route('customer_login')->with('success', 'To Complete The Reset Password Successfully');
  }
}
