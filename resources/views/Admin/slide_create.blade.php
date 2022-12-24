@extends('Admin.layout.app')

@section('heading', 'Create New Slider')

@section('button')
  <a href="{{ route('admin_slide_view') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Slide view</a> 
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_slide_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                         
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Choose Photo *</label>
                                    <input type="file" class="form-control mt_10" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">text</label>
                                   <textarea name="text" class="form-control snote" cols="30" rows="10">{{ old('text') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" value="{{ old('button_text') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Url</label>
                                    <input type="text" class="form-control" name="button_url" value="{{ old('button_url') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Save</button>
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