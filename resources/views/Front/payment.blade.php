@extends('Front.layout.app')

@section('main_content')

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->payment_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-lg-4 col-md-4 checkout-left mb_30">
                
                <h4>Make Payment</h4>
                <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                    <option value="">Select Payment Method</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Stripe">Stripe</option>
                    <option value="hand">Pay by hand</option>
                </select>

                <div class="paypal mt_20">
                    <h4>Pay with PayPal</h4>
                    <div id="paypal-button"></div>
                </div>

                <div class="stripe mt_20">
                    <h4>Pay with Stripe</h4>
                    <p>Write necessary code here</p>
                </div>

                <div class="hand mt_20">
                    <h4>Pay with Hand</h4>
                    <p>Write necessary code here</p>
                </div>


            </div>

            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Billing Details</h4>

                    <div>
                        Name: {{ session()->get('billing_name') }}
                    </div>
                       <hr>
                    <div>
                        E-Mail: {{ session()->get('billing_email') }}
                    </div>
                       <hr>
                    <div>
                        Phone: {{ session()->get('billing_phone') }}
                    </div>
                       <hr>
                    <div>
                        Country: {{ session()->get('billing_country') }}
                    </div>
                       <hr>
                    <div>
                        Address: {{ session()->get('billing_address') }}
                    </div>
                       <hr>
                    <div>
                        State: {{ session()->get('billing_state') }}
                    </div>
                       <hr>
                    <div>
                        City: {{ session()->get('billing_city') }}
                    </div>
                       <hr>
                    <div>
                        Zip-Code: {{ session()->get('billing_zip') }}
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 checkout-right">
                <div class="inner">
                    <h4 class="mb_10">Cart Details</h4>
                    <div class="table-responsive">
                        <table class="table">

                            <tbody>

                            @php
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

                            $total_price = 0;

                            for ($i=0; $i <count($arr_cart_room_id) ; $i++) { 

                                $room_data = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();

                               @endphp

                               <tr>
                                    <td>
                                        {{ $room_data->name }}
                                        <br>
                                        ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                        <br>
                                        Adult: {{ $arr_cart_adult[$i] }}, Children: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td class="p_price">
                                        @php
                                            $d1 = explode('/', $arr_cart_checkin_date[$i]);
                                            $d2 = explode('/', $arr_cart_checkout_date[$i]);
                                            $d1_new = $d1[2]. '-' .$d1[1]. '-' .$d1[0];
                                            $d2_new = $d2[2]. '-' .$d2[1]. '-' .$d2[0];
                                            $t1 = strtotime($d1_new);
                                            $t2 = strtotime($d2_new);
                                            $diff = ($t2 - $t1)/60/60/24;
                                            echo '$'. $room_data->price * $diff;

                                        @endphp
                                        
                                        </td>
                              
                              </tr>

                               @php
                               $total_price = $total_price + ($room_data->price * $diff);
                            }
                            
                        @endphp

                                <tr>
                                    <td><b>Total:</b></td>
                                    <td class="p_price"><b>{{ $total_price }}</b></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@php
    $client = 'ARLqUMmT--JqQEes4U8YHVfovFGzZcK8Bba-qj1ia9WKtW46A8BHF9OeW7R0qYsFhqzNQOO55Vyit6aj';
    // $final_price = '5';
@endphp

<script>
	paypal.Button.render({
		env: 'sandbox',
		client: {
			sandbox: '{{ $client }}',
			production: '{{ $client }}'
		},
		locale: 'en_US',
		style: {
			size: 'medium',
			color: 'blue',
			shape: 'rect',
		},
		// Set up a payment
		payment: function (data, actions) {
			return actions.payment.create({
				redirect_urls:{
					return_url: '{{ url("payment/paypal/$total_price") }}'
				},
				transactions: [{
					amount: {
						total: '{{ $total_price }}',
						currency: 'USD'
					}
				}]
			});
		},
		// Execute the payment
		onAuthorize: function (data, actions) {
			return actions.redirect();
		}
	}, '#paypal-button');
</script>


@endsection