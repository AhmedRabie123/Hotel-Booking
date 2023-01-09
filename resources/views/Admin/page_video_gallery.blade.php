@extends('Admin.layout.app')

@section('heading', 'Edit Video Gallery Page')

@section('button')
    <a href="{{ route('admin_video_gallery_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Video Gallery view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_video_gallery_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Video Gallery Heading *</label>
                                        <input type="text" class="form-control mt_10" name="video_gallery_heading"
                                            value="{{ $page_data->video_gallery_heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Video Gallery Status</label>
                                        <select name="video_gallery_status" class="form-control">
                                            <option value="Show" @if ($page_data->video_gallery_status == 'Show') Selected @endif>Show
                                            </option>
                                            <option value="Hide" @if ($page_data->video_gallery_status == 'Hide') Selected @endif>Hide
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
