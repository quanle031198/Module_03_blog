@extends('backend.layout.home')
@section('title', 'Post List')
@section('content')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <h5 class="card-title">@yield('title')</h5>
                </div>
            </div>
            {{-- @if (isset($totalCategoryFilter))
                    <span class="text-muted">
                    {{'Tìm thấy' . ' ' . $totalCategoryFilter . ' '. 'khách hàng:'}}
                </span>
                @endif

                @if (isset($categoryFilter))
                    <div class="pl-5">
                   <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                       {{ 'Thuộc tỉnh' . ' ' . $categoryFilter->name }}</span>
                    </div>
                @endif --}}
            <a class="mb-2 mr-2 btn-transition btn btn-outline-info" href="" title="Filter" data-toggle="modal"
                data-target="#categoryModal">
                <i class="fa fa-filter"></i>
            </a>

            <ul class="header-menu nav float-right">
                <form class="" method="GET" action="{{ route('blog.search') }}">
                    @csrf
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <div class="input-group"><input name="keyword" value="" type="text" class="form-control">
                                <div class="input-group-append">
                                    <button type="submitAjax" class="btn btn-outline-info"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </form>
            </ul>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="mb-0 table table-striped ">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Title</th>

                                <th>Image summary</th>
                                <th>Category</th>
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
                                        <th>{{ ++$key }}</th>
                                        <td><a href="{{ route('blog.detail', $blog->id) }} "
                                                class="nav-link">{{ $blog->title }}</a></td>

                                        <td>
                                            @if ($blog->summary_img)
                                                <img src="{{ asset('storage/' . $blog->summary_img) }}" alt=""
                                                    style="width: 130px; height: 130px">
                                            @else
                                                {{ 'Chưa có ảnh' }}
                                            @endif
                                        </td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>
                                            <a class="mb-2 mr-2 btn btn-secondary"
                                                href="{{ route('blog.edit', $blog->id) }}"> <i class="pe-7s-file"></i>
                                                Edit</a>
                                            <a class="mb-2 mr-2 btn btn-secondary"
                                                href="{{ route('blog.delete', $blog->id) }}"><i class=" pe-7s-trash "></i>
                                                Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <nav class="d-flex justify-content-center" aria-label="Page navigation example ">
                    <ul class="pagination">
                        {!! $blogs->links('pagination::bootstrap-4') !!}
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="categoryModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content--> --}}
            <form action="{{ route('blog.filter') }}" method="get">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Lọc theo category -->
                        <div class="select-by-program">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label border-right">Filter blogs by category</label>
                                <div class="col-sm-7">
                                    <select class="custom-select w-100" name="category_id">
                                        <option value="">Chooose Category</option>
                                        @foreach ($categories as $category)
                                            @if (isset($categoryFilter))
                                                @if ($category->id == $categoryFilter->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!--End-->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </form>
        {{-- </div>
    </div> --}}
    
@endsection;
