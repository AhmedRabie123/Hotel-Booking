@extends('Front.layout.app')

@section('main_content')
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $global_page_data->checkout_heading }}</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 checkout-left">

                    <form action="payment.html" method="post" class="frm_checkout">
                        @csrf
                        <div class="billing-info">
                            <h4 class="mb_30">Billing Information</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="">Name: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_name" value="{{ Auth::guard('customer')->user()->name }}">
                                    @if ($errors->has('billing_name'))
                                        <span class="text-danger">{{ $errors->first('billing_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Email Address: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_email" value="{{ Auth::guard('customer')->user()->email }}">
                                    @if ($errors->has('billing_email'))
                                        <span class="text-danger">{{ $errors->first('billing_email') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Phone Number: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                    @if ($errors->has('billing_phone'))
                                        <span class="text-danger">{{ $errors->first('billing_phone') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Country: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_country" value="{{ Auth::guard('customer')->user()->country }}">
                                    @if ($errors->has('billing_country'))
                                        <span class="text-danger">{{ $errors->first('billing_country') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Address: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_address" value="{{ Auth::guard('customer')->user()->address }}">
                                    @if ($errors->has('billing_address'))
                                        <span class="text-danger">{{ $errors->first('billing_address') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">State: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_state" value="{{ Auth::guard('customer')->user()->state }}">
                                    @if ($errors->has('billing_state'))
                                        <span class="text-danger">{{ $errors->first('billing_state') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">City: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_city" value="{{ Auth::guard('customer')->user()->city }}">
                                    @if ($errors->has('billing_city'))
                                        <span class="text-danger">{{ $errors->first('billing_city') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Zip Code: *</label>
                                    <input type="text" class="form-control mb_15" name="billing_zip" value="{{ Auth::guard('customer')->user()->zip }}">
                                    @if ($errors->has('billing_zip'))
                                        <span class="text-danger">{{ $errors->first('billing_zip') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary bg-website mb_30">Continue to payment</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 checkout-right">
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



    @endsection