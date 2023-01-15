<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

use function PHPUnit\Framework\returnSelf;

class AdminSubscriberController extends Controller
{
    public function show()
    {
        $all_subscriber = Subscriber::where('status', 1)->get();
        return view('Admin.subscriber_show', compact('all_subscriber'));
    }

    public function send_email()
    {
        return view('Admin.subscriber_send_email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Send Email

        $subject = $request->subject;
        $message = $request->message;

        $all_subscriber = Subscriber::where('status', 1)->get();

        foreach ($all_subscriber as $item) {

            \Mail::to($item->email)->send(new Websitemail($subject, $message));
        }

        return redirect()->route('admin_home')->with('success', 'E-Mail Is Sent Successfully.');

    }

}