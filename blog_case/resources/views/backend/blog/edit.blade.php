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
                                <img class="img-thumbnail" alt="Responsive image"
                                    src="{{ asset('storage/' . $blog->summary_img) }}" />
                                <input name="summary_img" id="summary_img" type="file" class="form-control-file" />
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
                                <textarea class="form-control" name="summary" id="summary">{{ $blog->summary }}</textarea>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" id="content">{{ $blog->content }}</textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-5">
                                <div class="position-relative form-group">
                                    <label for="author" class="col col-form-label">Author</label>
                                    <div class="col">
                                        <input name="author" id="author" placeholder="author" type="text"
                                            value="{{ $blog->author }}" class="form-control">
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
                                <button type="submit" class="mb-2 mr-2 btn btn-primary">Update</button>
                                <button class="mb-2 mr-2 btn-transition btn btn-outline-danger"
                                onclick="history.go(-1); return false;">Cancel</button>
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
                        <th>Author</th>
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
                                <td>{{ $blog->author }}</td>
                                <td><a href="{{ route('blog.edit', $blog->id) }}"><i class="nav-link-icon"></i>Edit</a> |
                                    <a href="{{ route('blog.delete', $blog->id) }}"><i
                                            class="ti-trash text-danger"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
