@extends('Admin.layout.app')

@section('heading', 'Edit Post')

@section('button')
    <a href="{{ route('admin_post_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Post view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_post_update', $post_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo </label>
                                        <div>
                                            <img src="{{ asset('uploads/' . $post_single->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Change Photo </label>
                                        <input type="file" class="form-control mt_10" name="photo">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Heading *</label>
                                        <input type="text" class="form-control" name="heading"
                                            value="{{ $post_single->heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Short Content *</label>
                                        <textarea name="short_content" class="form-control h_100" cols="30" rows="10">{{ $post_single->short_content }}</textarea>
                                    </div>
    
                                    <div class="mb-4">
                                        <label class="form-label">Content *</label>
                                       <textarea name="content" class="form-control snote" cols="30" rows="10">{{ $post_single->content }}</textarea>
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
