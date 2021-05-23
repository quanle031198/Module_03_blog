@extends('backend.layout.home')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            {{-- <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Table striped</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Tên</th>
                                <th>Khóa thay thế</th>
                                <th>Tổng số bài viết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $category['id'] }}</td>
                                <td>{{ $category['name'] }}</td>
                                <td>{{ $category['slug'] }}</td>
                                <td>{{ $category['total_post'] }}</td>
                                <td><a href="{{ route('category.show-edit', $category['id']) }}"><i
                                            class="nav-link-icon"></i>Edit</a> |
                                    <i class="ti-trash text-danger"></i>Delete
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
