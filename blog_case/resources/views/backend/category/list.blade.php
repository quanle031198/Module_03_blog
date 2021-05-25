@extends('backend.layout.home')
@section('title', 'Category List')
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
                        <th>Stt</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Tool</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) == 0)
                        <tr>
                            <td colspan="4">Empty data !</td>
                        </tr>
                    @else
                        @foreach ($categories as $key => $categorie)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $categorie->name }}</td>
                        
                                <td>
                                    @if ($categorie->cate_img)
                                        <img src="{{ asset('storage/' . $categorie->cate_img) }}" alt=""
                                            style="width: 130px; height: 130px">
                                    @else
                                        {{ 'Chưa có ảnh' }}
                                    @endif
                                </td>
                            
                                {{-- <td><a href="{{ route('blog.edit', $categorie->id) }}"><i class="nav-link-icon"></i>Edit</a> |
                                    <a href="{{ route('blog.delete', $categorie->id) }}"><i
                                            class="ti-trash text-danger"></i>Delete</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection;
