@extends('Front.layout.app')

@section('main_content')
    <div class="slider">
        <div class="slide-carousel owl-carousel">
            @foreach ($slider as $item)
                <div class="item" style="background-image:url({{ asset('uploads/' . $item->photo) }});">
                    <div class="bg"></div>
                    <div class="text">
                        @if ($item->heading != '')
                            <h2>{{ $item->heading }}</h2>
                        @endif

                        @if ($item->text != '')
                            <p>
                                {!! nl2br($item->text) !!}
                            </p>
                        @endif
                        @if ($item->button_url && $item->button_text != '')
                            <div class="button">
                                <a href="{{ $item->button_url }}" target="_blank">{{ $item->button_text }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="search-section">
        <div class="container">
            <form action="{{ route('cart_submit') }}" method="post">
                @csrf
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select name="room_id" class="form-select">
                                    <option value="">Select Room</option>
                                    @foreach ($room_all as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="checkin_checkout" class="form-control daterange1"
                                    placeholder="Checkin & Checkout">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="adult" class="form-control" min="0" max="30"
                                    placeholder="Adults">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="children" class="form-control" min="0" max="30"
                                    placeholder="Children">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="home-feature">
        <div class="container">
            <div class="row">

                @foreach ($features as $item)
                    <div class="col-md-3">
                        <div class="inner">
                            <div class="icon"><i class="{{ $item->icon }}"></i></div>
                            <div class="text">
                                @if ($item->heading != '')
                                    <h2>{{ $item->heading }}</h2>
                                @endif
                                @if ($item->text != '')
                                    <p>
                                        {!! nl2br($item->text) !!}
                                    </p>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>



    <div class="home-rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Rooms and Suites</h2>
                </div>
            </div>
            <div class="row">

                @foreach ($room_all as $item)
                    {{-- I did not apply if condition in the bottom line because I used the limit in HomeController in line 21 --}}

                    {{-- @if ($loop->iteration > 3)
                    @break
                @endif --}}

                    <div class="col-md-3">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('uploads/' . $item->featured_photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('room_detail', $item->id) }}">{{ $item->name }}</a></h2>
                                <div class="price">
                                    ${{ $item->price }}/Night
                                </div>
                                <div class="button">
                                    <a href="{{ route('room_detail', $item->id) }}" class="btn btn-primary">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="big-button">
                        <a href="{{ route('room_data') }}" class="btn btn-primary">See All Rooms</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="testimonial" style="background-image: url(uploads/slide2.jpg)">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Our Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-carousel owl-carousel">

                        @foreach ($testimonials as $item)
                            <div class="item">
                                <div class="photo">
                                    <img src="{{ asset('uploads/' . $item->photo) }}" alt="">
                                </div>
                                <div class="text">
                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->designation }}</p>
                                </div>
                                <div class="description">
                                    <p>
                                        {!! nl2br($item->comment) !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="blog-item">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Latest Posts</h2>
                </div>
            </div>
            <div class="row">

                @foreach ($posts as $item)
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('uploads/' . $item->photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="{{ route('blog_detail', $item->id) }}">{{ $item->heading }}</a></h2>
                                <div class="short-des">
                                    <p>
                                        {!! nl2br($item->short_content) !!}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('blog_detail', $item->id) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
@endsection
