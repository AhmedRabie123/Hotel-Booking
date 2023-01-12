@extends('Admin.layout.app')

@section('heading', 'Edit Room')

@section('button')
    <a href="{{ route('admin_room_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Room view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_room_update', $room_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Existing Photo </label>
                                        <div>
                                            <img src="{{ asset('uploads/' . $room_single->featured_photo) }}" alt=""
                                                class="w_200">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Change Photo </label>
                                        <input type="file" class="form-control mt_10" name="featured_photo">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $room_single->name }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        <textarea name="description" class="form-control snote" cols="30" rows="10">{{ $room_single->description }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Price (Per Night) *</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $room_single->price }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Rooms *</label>
                                        <input type="text" class="form-control" name="total_rooms"
                                            value="{{ $room_single->total_rooms }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Amenities *</label>
                                        @php $i=0; @endphp
                                        @foreach ($all_amenities as $item)

                                        {{-- in_array here refer to array in adminroomcontroler in line 84 --}}
                                        
                                            @if (in_array($item->id, $existing_amenities))
                                                @php $checked_type = 'checked'; @endphp
                                            @else
                                                @php $checked_type = ''; @endphp
                                            @endif

                                            @php $i++; @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="defaultCheck{{ $i }}" name="amenities[]"
                                                    {{ $checked_type }}>
                                                <label class="form-check-label" for="defaultCheck{{ $i }}">
                                                    {{ $item->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Size *</label>
                                        <input type="text" class="form-control" name="size"
                                            value="{{ $room_single->size }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Beds *</label>
                                        <input type="text" class="form-control" name="total_beds"
                                            value="{{ $room_single->total_beds }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Bathrooms *</label>
                                        <input type="text" class="form-control" name="total_bathrooms"
                                            value="{{ $room_single->total_bathrooms }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Balconies *</label>
                                        <input type="text" class="form-control" name="total_balconies"
                                            value="{{ $room_single->total_balconies }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Total Guests *</label>
                                        <input type="text" class="form-control" name="total_guests"
                                            value="{{ $room_single->total_guests }}">
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Video Preview *</label>
                                        <div>
                                            <iframe width="260" height="215"
                                                src="https://www.youtube.com/embed/{{ $room_single->video_id }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Video Id *</label>
                                        <input type="text" class="form-control" name="video_id"
                                            value="{{ $room_single->video_id }}">
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
