@extends('Admin.layout.app')

@section('heading', 'Edit Video')

@section('button')
    <a href="{{ route('admin_video_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Video view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_video_update', $video_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Video Preview</label>
                                        <div>
                                            <iframe width="260" height="215"
                                                src="https://www.youtube.com/embed/{{ $video_single->video_id }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Change Video ID *</label>
                                        <input type="text" class="form-control mt_10" name="video_id"
                                            value="{{ $video_single->video_id }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Caption</label>
                                        <textarea name="caption" class="form-control snote" cols="30" rows="10">{{ $video_single->caption }}</textarea>
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
