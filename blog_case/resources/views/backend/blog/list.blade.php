@extends('backend.layout.home')
@section('title', 'Post List')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <h5 class="card-title">@yield('title')</h5>
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                    <form class="navbar-form navbar-left" action="">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                
            </div>
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
                                <td >{{ $blog->source }}</td>
                                <td><a href="{{ route('blog.detail', $blog->id) }}"><i class="nav-link-icon"></i>Detail</a>
                                    <a href="{{ route('blog.edit', $blog->id) }}"><i class="nav-link-icon"></i>Edit</a> |
                                    <a href="{{ route('blog.delete', $blog->id) }}"><i
                                            class="ti-trash text-danger"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $blogs->links('pagination::bootstrap-4') !!}
            </div>

        </div>
    </div>
@endsection;
