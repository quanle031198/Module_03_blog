@extends('backend.layout.home')
@section('title', 'Post Detail')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            {{-- <div class="form-row">
                <div class="col"> --}}
                    <h5 class="card-title">@yield('title')</h5>
                {{-- </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    
                </div>
                
            </div> --}}
            <table class="mb-0 table table-striped">
                <thead>
                    <tr>
                      
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Image summary</th>
                        <th>Source</th>
                        <th>Category</th>
                        <th>Tool</th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
    
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
                                <td >{{ $blog->category->name }}</td>
                                <td><a href="{{ route('blog.edit', $blog->id) }}"><i class="nav-link-icon"></i>Edit</a> |
                                    <a href="{{ route('blog.delete', $blog->id) }}"><i
                                            class="ti-trash text-danger"></i>Delete</a>
                                </td>
                            </tr>
                   
                </tbody>
            </table>
        
        </div>
    </div>
@endsection;
