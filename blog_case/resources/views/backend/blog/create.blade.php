@extends('backend.layout.home')
@section('title', 'Post Create')
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
            <div class="error-message">
                @if ($errors->any())
                    @foreach($errors->all() as $nameError)
                        
                        <div class=" alert alert-danger">
                            <strong>{{ $nameError }}</strong>
                          </div>
                    @endforeach
                @endif
            </div>
            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
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
                                        <div id="imagePreview" style="background-image: url({{ asset('storage/images/noimage.jpg') }});">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5">
                                <div class="position-relative form-group">
                                    <label for="category_id" class="col col-form-label">Category</label>
                                    <div class="col">
                                        <select id="category_id" class="form-control" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="source" class="col col-form-label">Source</label>
                                    <div class="col">
                                        <input name="source" id="source" placeholder="source" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="mb-2 mr-2 btn btn-primary">Create</button>
                                        <button class="mb-2 mr-2 btn-transition btn btn-outline-danger"
                                            onclick="history.go(-1); return false;">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="position-relative form-group">
                                    <label for="created" class="col col-form-label">Created</label>
                                    <div class="col">
                                        <input name="created" id="created" type="date" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="position-relative form-group">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" id="title" placeholder="Title" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="summary" id="summary" ></textarea>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="ckeditor form-control" name="content" id="content"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
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
