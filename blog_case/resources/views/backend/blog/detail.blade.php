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
            {{-- <table class="mb-0 table table-striped">
                <thead>
                    <tr>

                        <th>Title</th>
                        <th>Summary</th>
                        <th>Image summary</th>
                        <th>Source</th>
                        <th>Content</th>
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

                        <td>{{ $blog->source }}</td>
                        <td>{!! $blog->content !!}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td><a class="mb-2 mr-2 btn btn-secondary" href="{{ route('blog.edit', $blog->id) }}"><i
                                    class="pe-7s-file"></i> Edit</a>
                            <a class="mb-2 mr-2 btn btn-secondary" href="{{ route('blog.delete', $blog->id) }}"><i
                                    class=" pe-7s-trash "></i> Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table> --}}

            <div class="single-post">
                <!-- Post Thumb -->
                <div class="post-thumb">
                    @if ($blog->summary_img)
                                <img src="{{ asset('storage/' . $blog->summary_img) }}" alt=""/>
                            @else
                                {{ 'Chưa có ảnh' }}
                            @endif
                </div>
                <!-- Post Content -->
                <div class="post-content">
                    <div class="post-meta d-flex">
                        <div class="post-author-date-area d-flex">
                            <!-- Post Author -->
                            <div class="post-author">
                                <a href="#">By Marian</a>
                            </div>
                            <!-- Post Date -->
                            <div class="post-author">
                                <a href="#">{{ $blog->category->name }}</a>
                            </div>

                            <div class="post-date">
                                <p>{{ $blog->created }}</p>
                            </div>
                        </div>
                        <!-- Post Comment & Share Area -->
                        <div class="post-comment-share-area d-flex">
                            <!-- Post Favourite -->
                            <div class="post-favourite">
                                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 10</a>
                            </div>
                            <!-- Post Comments -->
                            <div class="post-comments">
                                <a href="#"><i class="fa fa-comment" aria-hidden="true"></i> 12</a>
                            </div>
                            <!-- Post Share -->
                        </div>
                    </div>
                    <p>
                        <h2 class="post-headline">{{ $blog->title }}</h2>
                    </p>
                    <p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>

                    <blockquote class="yummy-blockquote mt-30 mb-30">
                        <h5 class="mb-30">“Technology is nothing. What's important is that you have a faith in people, that they're basically good and smart, and if you give them tools, they'll do wonderful things with them.”</h5>
                        <h6 class="text-muted">Steven Jobs</h6>
                    </blockquote>

                    <h4>You Can Buy For Less Than A College Degree</h4>
                    <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                    <img class="br-30 mb-30" src="img/blog-img/11.jpg" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>

                    <img class="br-30 mb-30" src="img/blog-img/12.jpg" alt="">
                    <p>Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                    <img class="br-30 mb-30" src="img/blog-img/13.jpg" alt="">
                    <h4>You Can Buy For Less Than A College Degree</h4>
                    <p>Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                    <ul class="mb-30">
                        <li>1/3 cup Lonsectetur adipisicing elit.Lorem ipsum</li>
                        <li>1/2 cup Veniam, quis nostrud exercitation</li>
                        <li>Ut labore et dolore magna</li>
                        <li>Lonsectetur adipisicing elit.Lorem ipsum</li>
                        <li>Lonsectetur adipisicing elit.Lorem ipsum</li>
                        <li>Ut labore et dolore magna</li>
                        <li>Lonsectetur adipisicing elit.Lorem ipsum</li>
                    </ul>

                    <img class="br-30 mb-15" src="img/blog-img/14.jpg" alt="">
                </div>
            </div>
            
        </div>
    </div>
@endsection;
