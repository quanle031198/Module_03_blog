@extends('backend.layout.home')
@section('title', 'Post Update')
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
            <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-md-5">
                        <div class="position-relative form-group">
                            <div class="col-sm-10">
                                <div class="avatar-edit">
                                    <input name="summary_img" type='file' id="summary_img"/>
                                    <label class="fa fa-upload lb-up" for="summary_img"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{ asset('storage/' . $blog->summary_img) }});">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5">
                                <div class="position-relative form-group">
                                    <label for="category_id" class="col col-form-label">Category</label>
                                    <div class="col">
                                        <select class="form-control" name="category_id" id="category_id">
                                            @foreach ($categories as $category)
                                                <option @if ($blog->category_id == $category->id) {{ 'selected' }} @endif
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="source" class="col col-form-label">Source</label>
                                    <div class="col">
                                        <input name="source" id="source" placeholder="source" type="text"
                                            value="{{ $blog->source }}" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-5">
                                <div class="position-relative form-group">
                                    <label for="created" class="col col-form-label">Created</label>
                                    <div class="col">
                                        <input name="created" id="created" type="date" value="{{ $blog->created }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <div class="col-sm-10">

                                <a class="mb-2 mr-2 btn-transition btn btn-outline-danger"
                                    href="{{ route('blog.index') }}"><i class="pe-7s-back"></i>
                                    Back</a>
                                <button type="submit" class="mb-2 mr-2 btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="position-relative form-group">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" id="title" placeholder="Title" type="text" value="{{ $blog->title }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="summary"
                                    id="summary">{{ $blog->summary }}</textarea>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="ckeditor form-control" name="content"
                                    id="content">{!! $blog->content !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">@yield('title')</h5>
            <table class="mb-0 table table-striped">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Image summary</th>
                        <th>Source</th>
                        <th>Tool</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($blogs) == 0)
                        <tr>
                            <td colspan="4">Empty data !</td>
                        </tr>
                    @else
                        @foreach ($blogs as $key => $blog)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->summary }}</td>

                                <td>
                                    @if ($blog->summary_img)
                                        <img src="{{ asset('storage/' . $blog->summary_img) }}" alt=""
                                            style="width: 130px; height: 130px">
                                    @else
                                        {{ 'Chưa có ảnh' }}
                                    @endif
                                </td>
                                <td>{{ $blog->source }}</td>
                                <td><a class="mb-2 mr-2 btn btn-secondary" href="{{ route('blog.edit', $blog->id) }}"><i
                                            class="pe-7s-file"></i> Edit</a>
                                    <a class="mb-2 mr-2 btn btn-secondary"
                                        href="{{ route('blog.delete', $blog->id) }}"><i class="pe-7s-trash "></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{-- <div class="d-flex justify-content-center">
                
            </div> --}}
            <div class="card-body">
                <nav class="d-flex justify-content-center" aria-label="Page navigation example ">
                    <ul class="pagination">
                        {!! $blogs->links('pagination::bootstrap-4') !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#summary_img").change(function() {
            readURL(this);
        });
        </script>
   
@endsection
