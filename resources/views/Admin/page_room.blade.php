@extends('Admin.layout.app')

@section('heading', 'Edit Room Page')

@section('button')
    <a href="{{ route('admin_room_page') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Room view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_room_update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Room Heading *</label>
                                        <input type="text" class="form-control mt_10" name="room_heading"
                                            value="{{ $page_data->room_heading }}">
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
