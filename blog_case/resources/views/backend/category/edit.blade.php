@extends('backend.layout.home')
@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            {{-- <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Cập nhật chuyên mục</h5>
                    <form method="POST" action="{{ route('category.edit') }}">
                        @csrf
                        <input name="id" type="hidden" value="{{ $cate['id'] }}" />
                        <div class="position-relative row form-group">
                            <label for="category_name" class="col-sm-2 col-form-label">Tên chuyên mục</label>
                            <div class="col-sm-5">
                                <input name="name" id="category_name" placeholder="tên chuyên mục" type="text"
                                    value="{{ $cate['name'] }}" class="form-control">
                                <small id="category_name" class="form-text text-muted">Tên chuyên mục không nên dài quá 100
                                    ký tự.</small>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="slug" class="col-sm-2 col-form-label">Khóa thay thế</label>
                            <div class="col-sm-5">
                                <input name="slug" id="slug" placeholder="khóa thay thế" type="text" class="form-control"
                                    value="{{ $cate['slug'] }}">
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-secondary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Table striped</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Tên</th>
                                <th>Khóa thay thế</th>
                                <th>Tổng hợp số lượng</th>
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
                                <td>
                                    <a href="#" class="mb-2 mr-2 btn-transition btn btn-outline-secondary">Edit</a>
                                    <a href="#" class="mb-2 mr-2 btn-transition btn btn-outline-secondary">Delete</a> 
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
