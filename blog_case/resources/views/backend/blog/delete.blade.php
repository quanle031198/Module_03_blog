@extends('backend.layout.home')
@section('title', 'Post Delete')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
            <h5 class="card-title">@yield('title')</h5>
            <form method="POST" action="{{ route('blog.destroy', $blog->id) }}">
                @csrf
                <h2 class="mb-4 mr-4 badge badge-danger">Do you want to Delete ?</h2>
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <div class="col-sm-10">
                                <img class="img-thumbnail" alt="Responsive image"
                                    src="{{ asset('storage/' . $blog->summary_img) }}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-12">
                                <input disabled name="title" id="title" placeholder="Title" type="text"
                                    value="{{ $blog->title }}" class="form-control">
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="source" class="col col-form-label">Source</label>
                            <div class="col-sm-8">
                                <input disabled name="source" id="source" placeholder="source" type="text"
                                    value="{{ $blog->source }}" class="form-control">
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="mb-2 mr-2 btn btn-danger">Delete</button>
                                <button class="mb-2 mr-2 btn-transition btn btn-outline-primary"
                                onclick="history.go(-1); return false;" >Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
