@extends('Admin.layout.app')

@section('heading', 'Create New Room')

@section('button')
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Rooms view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_room_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Choose Photo *</label>
                                        <input type="file" class="form-control mt_10" name="featured_photo">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control snote" cols="30" rows="10">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Price (Per Night)</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Rooms</label>
                                        <input type="text" class="form-control" name="total_rooms"
                                            value="{{ old('total_rooms') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Amenities *</label>
                                        @php $i=0; @endphp
                                        @foreach ($all_amenities as $item)
                                        @php $i++; @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="defaultCheck{{ $i }}" name="amenities[]">
                                                <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                   {{ $item->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Size *</label>
                                        <input type="text" class="form-control" name="size"
                                            value="{{ old('size') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Beds *</label>
                                        <input type="text" class="form-control" name="total_beds"
                                            value="{{ old('total_beds') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Bathrooms *</label>
                                        <input type="text" class="form-control" name="total_bathrooms"
                                            value="{{ old('total_bathrooms') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Balconies *</label>
                                        <input type="text" class="form-control" name="total_balconies"
                                            value="{{ old('total_balconies') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Guests *</label>
                                        <input type="text" class="form-control" name="total_guests"
                                            value="{{ old('total_guests') }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Video Id *</label>
                                        <input type="text" class="form-control" name="video_id"
                                            value="{{ old('video_id') }}">
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