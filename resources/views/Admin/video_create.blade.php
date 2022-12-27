@extends('Admin.layout.app')

@section('heading', 'Create New Video')

@section('button')
  <a href="{{ route('admin_video_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Video view</a> 
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_video_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                         
                            <div class="col-md-12">

                                <div class="mb-4">
                                    <label class="form-label">Video ID *</label>
                                    <input type="text" class="form-control mt_10" name="video_id">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Caption</label>
                                    <textarea name="caption" class="form-control snote" cols="30" rows="10">{{ old('caption') }}</textarea>
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