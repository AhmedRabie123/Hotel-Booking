@extends('Customer.layout.app')

@section('heading', 'Edit Customer Profile')

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer_profile_submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                @if (Auth::guard('customer')->user()->photo == '')
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/default.png') }}" alt=""
                                            class="profile-photo w_100_p">
                                        <input type="file" class="form-control mt_10" name="photo">
                                    </div>
                                @else
                                    <div class="col-md-3">
                                        <img src="{{ asset('uploads/' . Auth::guard('customer')->user()->photo) }}"
                                            alt="" class="profile-photo w_100_p">
                                        <input type="file" class="form-control mt_10" name="photo">
                                    </div>
                                @endif


                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ Auth::guard('customer')->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Email *</label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ Auth::guard('customer')->user()->email }}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Phone </label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ Auth::guard('customer')->user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Country </label>
                                                <input type="text" class="form-control" name="country"
                                                    value="{{ Auth::guard('customer')->user()->country }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Address </label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ Auth::guard('customer')->user()->address }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">State </label>
                                                <input type="text" class="form-control" name="state"
                                                    value="{{ Auth::guard('customer')->user()->state }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">City</label>
                                                <input type="city" class="form-control" name="city"
                                                    value="{{ Auth::guard('customer')->user()->city }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Zip (Code)</label>
                                                <input type="zip" class="form-control" name="zip"
                                                    value="{{ Auth::guard('customer')->user()->zip }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Retype Password</label>
                                                <input type="password" class="form-control" name="retype_password">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
