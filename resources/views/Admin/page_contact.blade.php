@extends('Admin.layout.app')

@section('heading', 'Edit Contact Page')

@section('button')
    <a href="{{ route('admin_contact_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Contact view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_contact_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Contact Heading *</label>
                                        <input type="text" class="form-control mt_10" name="contact_heading"
                                            value="{{ $page_data->contact_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Map Iframe Code *</label>
                                        <textarea name="contact_map" class="form-control h_100" cols="30" rows="10">{{ $page_data->contact_map }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Contact Status</label>
                                        <select name="contact_status" class="form-control">
                                            <option value="Show" @if ($page_data->contact_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->contact_status == 'Hide') Selected @endif>Hide
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
