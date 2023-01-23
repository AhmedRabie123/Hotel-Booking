<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
// use PayPal\Api\Amount;
// use PayPal\Api\Details;
// use PayPal\Api\Payment;
// use PayPal\Api\PaymentExecution;
// use PayPal\Api\Transaction;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class BookingController extends Controller
{
    public function cart_submit(Request $request)
    {
        // dd($request->room_id);

        $request->validate([
            'room_id' => 'required',
            'checkin_checkout' => 'required',
            'adult' => 'required',
            'children' => 'required'
        ]);

        $dates = explode(' - ', $request->checkin_checkout);
        // dd($dates);
        $checkin_date = $dates[0];
        $checkout_date = $dates[1];
        // echo $checkin_date;
        // echo '<br>';
        // echo $checkout_date;

        session()->push('cart_room_id', $request->room_id);
        session()->push('cart_checkin_date', $checkin_date);
        session()->push('cart_checkout_date', $checkout_date);
        session()->push('cart_adult', $request->adult);
        session()->push('cart_children', $request->children);

        return redirect()->back()->with('success', 'Room Is Added To Cart Successfully');
    }

    public function cart_view()
    {
        return view('Front.cart');
    }

    public function cart_delete($id)
    {
        //dd($id);

        $arr_cart_room_id = [];
        $i = 0;
        foreach (session()->get('cart_room_id') as $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
        }

        $arr_cart_checkin_date = [];
        $i = 0;
        foreach (session()->get('cart_checkin_date') as $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
        }

        $arr_cart_checkout_date = [];
        $i = 0;
        foreach (session()->get('cart_checkout_date') as $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
        }

        $arr_cart_adult = [];
        $i = 0;
        foreach (session()->get('cart_adult') as $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
        }

        $arr_cart_children = [];
        $i = 0;
        foreach (session()->get('cart_children') as $value) {
            $arr_cart_children[$i] = $value;
            $i++;
        }

        session()->forget('cart_room_id');
        session()->forget('cart_checkin_date');
        session()->forget('cart_checkout_date');
        session()->forget('cart_adult');
        session()->forget('cart_children');

        for ($i = 0; $i < count($arr_cart_room_id); $i++) {
            if ($arr_cart_room_id[$i] == $id) {
                continue;
            } else {
                session()->push('cart_room_id', $arr_cart_room_id[$i]);
                session()->push('cart_checkin_date', $arr_cart_checkin_date[$i]);
                session()->push('cart_checkout_date', $arr_cart_checkout_date[$i]);
                session()->push('cart_adult', $arr_cart_adult[$i]);
                session()->push('cart_children', $arr_cart_children[$i]);
            }
        }

        return redirect()->back()->with('success', 'Room Item Is Deleted From Cart Successfully');
    }

    public function checkout()
    {

        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer_login')->with('error', 'You Must Have To Login In Order To Checkout!');
        }

        if (!session()->has('cart_room_id')) {
            return redirect()->back()->with('error', 'There Is No Item In The Cart!');
        } else {
            return view('Front.checkout');
        }
    }

    public function payment(Request $request)
    {

        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer_login')->with('error', 'You Must Have To Login In Order To Checkout!');
        }

        if (!session()->has('cart_room_id')) {
            return redirect()->back()->with('error', 'There Is No Item In The Cart!');
        } else {

            $request->validate([
                'billing_name' => 'required',
                'billing_email' => 'required|email',
                'billing_phone' => 'required',
                'billing_country' => 'required',
                'billing_address' => 'required',
                'billing_state' => 'required',
                'billing_city' => 'required',
                'billing_zip' => 'required'
            ]);

            session()->put('billing_name', $request->billing_name);
            session()->put('billing_email', $request->billing_email);
            session()->put('billing_phone', $request->billing_phone);
            session()->put('billing_country', $request->billing_country);
            session()->put('billing_address', $request->billing_address);
            session()->put('billing_state', $request->billing_state);
            session()->put('billing_city', $request->billing_city);
            session()->put('billing_zip', $request->billing_zip);

            return view('Front.payment');
        }
    }

    public function paypal()
    {

        $final_price = '5';

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal_success'),
                "cancel_url" => route('paypal_success')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $final_price
                    ]
                ]
            ]
        ]);

        // dd($response);

        if (isset($response['id']) && $response['id'] != Null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal_cancel');
        }



        // $client = 'ARLqUMmT--JqQEes4U8YHVfovFGzZcK8Bba-qj1ia9WKtW46A8BHF9OeW7R0qYsFhqzNQOO55Vyit6aj';
        // $secret = 'ENhRgjXBNfPqBQgzZCzalNTOp9uex-Zlq9RJ3zVUdZpcYoFIdKmyPWN3Bj8eGeI4kV65J5NpSDGxZgNJ';

        // $apiContext = new \PayPal\Rest\PayPalClient(
        //     new \PayPal\Auth\OAuthTokenCredential(
        //         $client, // ClientID
        //         $secret // ClientSecret
        //     )
        // );


        // $paymentId = request('paymentId');
        // $payment = PayPalClient::get($paymentId, $apiContext);

        // $execution = new PaymentExecution();
        // $execution->setPayerId(request('PayerID'));

        // $transaction = new Transaction();
        // $amount = new Amount();
        // $details = new Details();

        // $details->setShipping(0)
        //     ->setTax(0)
        //     ->setSubtotal($final_price);

        // $amount->setCurrency('USD');
        // $amount->setTotal($final_price);
        // $amount->setDetails($details);
        // $transaction->setAmount($amount);

        // $execution->addTransaction($transaction);

        // $result = $payment->execute($execution, $apiContext);

        // if ($result->state == 'approved') {
        //     $paid_amount = $result->transactions[0]->amount->total;
        // }
    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient();

        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'completed') {
            return 'Payment is successfully';
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return 'payment is canceled';
    }
}
