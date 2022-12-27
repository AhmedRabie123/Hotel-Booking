@extends('Front.layout.app')

@section('main_content')

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Photo Gallery</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="photo-gallery">
                <div class="row">

                    @foreach ($photos as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="photo-thumb">
                                <img src="{{ asset('uploads/' . $item->photo) }}" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="{{ asset('uploads/' . $item->photo) }}" class="magnific"><i
                                            class="fa fa-plus"></i></a>
                                </div>
                            </div>

                            @if ($item->caption != '')
                                <div class="photo-caption">
                                    {!! nl2br($item->caption) !!}
                                </div>
                            @endif
                            
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $photos->links() }}
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
