<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Admin;
use App\Mail\Websitemail;

class ContactController extends Controller
{
    public function index()
    {
        $contact_data = Page::where('id', 1)->first();
        return view('Front.contact', compact('contact_data'));
    }

    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {

            //send message 

            $subject = 'Hotel Contact From E-Mail';
            $message = 'Visitor Email Information: <br>';
            $message .= '<br>Name: ' .$request->name;
            $message .= '<br>E-Mail: ' .$request->email;
            $message .= '<br>Message: ' .$request->message;
 
            $admin_data = Admin::where('id', 1)->first();
            $admin_email = $admin_data->email;

            \Mail::to($admin_email)->send(new Websitemail($subject, $message));

            return response()->json(['code' => 1, 'success_message' => 'Email Is Sent Successfully']);
        }
    }
}
