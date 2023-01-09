@extends('Admin.layout.app')

@section('heading', 'Edit Cart Page')

@section('button')
    <a href="{{ route('admin_cart_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Cart view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_cart_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Cart Heading *</label>
                                        <input type="text" class="form-control mt_10" name="cart_heading"
                                            value="{{ $page_data->cart_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Cart Status</label>
                                        <select name="cart_status" class="form-control">
                                            <option value="Show" @if ($page_data->cart_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->cart_status == 'Hide') Selected @endif>Hide
                                            </option>
                                        </select>
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
