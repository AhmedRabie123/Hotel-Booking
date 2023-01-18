@extends('Admin.layout.app')

@section('heading', 'Edit Forget Password Page')

@section('button')
    <a href="{{ route('admin_forget_password_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Forget Password view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_forget_password_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Forget Password Heading *</label>
                                        <input type="text" class="form-control mt_10" name="forget_password_heading"
                                            value="{{ $page_data->forget_password_heading }}">
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
