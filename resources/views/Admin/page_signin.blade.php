@extends('Admin.layout.app')

@section('heading', 'Edit Sign In Page')

@section('button')
    <a href="{{ route('admin_signin_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Sign In view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_signin_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Sign In Heading *</label>
                                        <input type="text" class="form-control mt_10" name="signin_heading"
                                            value="{{ $page_data->signin_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Sign In Status</label>
                                        <select name="signin_status" class="form-control">
                                            <option value="Show" @if ($page_data->signin_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->signin_status == 'Hide') Selected @endif>Hide
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
