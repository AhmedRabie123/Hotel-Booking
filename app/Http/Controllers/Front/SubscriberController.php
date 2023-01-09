<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {

            $token = hash('sha256', time());

            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 0;
            $subscriber->save();

            $verification_link = url('subscriber/verify/'.$request->email.'/'.$token);

            //send message 
            $subject = 'Subscriber Verification';
            $message = 'Please Click On The Link Below To Confirm Subscription: <br>';
            $message .= '<a href= "'.$verification_link.'"> ';
            $message .= $verification_link;
            $message .= '</a>';
        
           

            \Mail::to($request->email)->send(new Websitemail($subject, $message));

            return response()->json(['code' => 1, 'success_message' => 'Please Check You E-Mail To Confirm The Subscription']);
        }
    }

    public function verify($email, $token)
    {
        $subscriber_data = Subscriber::where('token', $token)->where('email', $email)->first();
        //dd($subscriber_data);

        if($subscriber_data){
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();

            return redirect()->route('home')->with('success', 'Your Subscription Verified Successfully!');

        }else{

            return redirect()->route('home')->with('error', 'There is an error in your data!');
        }
    }
}
