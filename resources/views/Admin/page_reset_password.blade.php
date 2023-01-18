@extends('Admin.layout.app')

@section('heading', 'Edit Reset Password Page')

@section('button')
    <a href="{{ route('admin_reset_password_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Reset Password view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_reset_password_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Reset Password Heading *</label>
                                        <input type="text" class="form-control mt_10" name="reset_password_heading"
                                            value="{{ $page_data->reset_password_heading }}">
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
