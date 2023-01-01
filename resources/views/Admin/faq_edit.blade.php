@extends('Admin.layout.app')

@section('heading', 'Edit Faq')

@section('button')
    <a href="{{ route('admin_faq_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Faq view</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_faq_update', $faq_single->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Question *</label>
                                        <input type="text" class="form-control mt_10" name="question" value="{{ $faq_single->question }}">
                                    </div>
    
                                    <div class="mb-4">
                                        <label class="form-label">Answer *</label>
                                        <textarea name="answer" class="form-control snote" cols="30" rows="10">{{ $faq_single->answer }}</textarea>
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
