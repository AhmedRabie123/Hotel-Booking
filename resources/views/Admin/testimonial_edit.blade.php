@extends('Admin.layout.app')

@section('heading', 'Edit Testimonials')

@section('button')
    <a href="{{ route('admin_testimonial_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Testimonials view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_testimonial_update', $testimonial_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo </label>
                                        <div>
                                            <img src="{{ asset('uploads/' . $testimonial_single->photo) }}" alt="" class="w_200">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Change Photo </label>
                                        <input type="file" class="form-control mt_10" name="photo">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $testimonial_single->name }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Designation *</label>
                                        <input type="text" class="form-control" name="designation"
                                        value="{{ $testimonial_single->designation }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Comment *</label>
                                        <textarea name="comment" class="form-control snote" cols="30" rows="10">{{ $testimonial_single->comment }}</textarea>

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
