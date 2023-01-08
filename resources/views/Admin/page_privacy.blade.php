@extends('Admin.layout.app')

@section('heading', 'Edit Privacy Policy Page')

@section('button')
    <a href="{{ route('admin_privacy_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Privacy Policy view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_privacy_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Privacy Heading *</label>
                                        <input type="text" class="form-control mt_10" name="privacy_heading"
                                            value="{{ $page_data->privacy_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Privacy Content *</label>
                                        <textarea name="privacy_content" class="form-control snote" cols="30" rows="10">{{ $page_data->privacy_content }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Privacy Status</label>
                                        <select name="privacy_status" class="form-control">
                                            <option value="Show" @if ($page_data->privacy_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->privacy_status == 'Hide') Selected @endif>Hide
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
