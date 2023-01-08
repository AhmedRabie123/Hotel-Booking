@extends('Admin.layout.app')

@section('heading', 'Edit Terms & Conditions Page')

@section('button')
    <a href="{{ route('admin_terms_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Terms & Conditions view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_terms_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Terms Heading *</label>
                                        <input type="text" class="form-control mt_10" name="terms_heading"
                                            value="{{ $page_data->terms_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Terms Content *</label>
                                        <textarea name="terms_content" class="form-control snote" cols="30" rows="10">{{ $page_data->terms_content }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Terms Status</label>
                                        <select name="terms_status" class="form-control">
                                            <option value="Show" @if ($page_data->terms_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->terms_status == 'Hide') Selected @endif>Hide
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
