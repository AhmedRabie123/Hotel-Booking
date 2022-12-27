@extends('Admin.layout.app')

@section('heading', 'Edit Photo')

@section('button')
    <a href="{{ route('admin_photo_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Photo view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_photo_update', $photo_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo </label>
                                        <div>
                                            <img src="{{ asset('uploads/' . $photo_single->photo) }}" alt=""
                                                class="w_200">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Change Photo </label>
                                        <input type="file" class="form-control mt_10" name="photo">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Caption</label>
                                        <textarea name="caption" class="form-control snote" cols="30" rows="10">{{ $photo_single->caption }}</textarea>
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
