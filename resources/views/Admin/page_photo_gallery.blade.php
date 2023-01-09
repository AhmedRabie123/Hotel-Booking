@extends('Admin.layout.app')

@section('heading', 'Edit Photo Gallery Page')

@section('button')
    <a href="{{ route('admin_photo_gallery_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Photo Gallery view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_photo_gallery_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Photo Gallery Heading *</label>
                                        <input type="text" class="form-control mt_10" name="photo_gallery_heading"
                                            value="{{ $page_data->photo_gallery_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Photo Gallery Status</label>
                                        <select name="photo_gallery_status" class="form-control">
                                            <option value="Show" @if ($page_data->photo_gallery_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->photo_gallery_status == 'Hide') Selected @endif>Hide
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
