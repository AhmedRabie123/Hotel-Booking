@extends('Admin.layout.app')

@section('heading', 'Edit Feature')

@section('button')
    <a href="{{ route('admin_feature_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Feature view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_feature_update', $feature_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    
                                    <div class="mb-4">
                                        <label class="form-label">Existing Icon </label>
                                        <div>
                                            <i class="{{ $feature_single->icon }} fz_50"></i>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Icon *</label>
                                        <input type="text" class="form-control" name="icon"
                                            value="{{ $feature_single->icon }}">
                                    </div>
                                   
                                    <div class="mb-4">
                                        <label class="form-label">Heading *</label>
                                        <input type="text" class="form-control" name="heading"
                                            value="{{ $feature_single->heading }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">text</label>
                                        <textarea name="text" class="form-control snote" cols="30" rows="10">{{ $feature_single->text }}</textarea>
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
