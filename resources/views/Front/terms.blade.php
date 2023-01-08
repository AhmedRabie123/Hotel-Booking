@extends('Front.layout.app')

@section('main_content')
    <div class="page-top">
        <div class="bg" style="background-image: url({{ asset('uploads/n1.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $terms_data->terms_heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        {!! nl2br($terms_data->terms_content) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
