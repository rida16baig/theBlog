@extends('layout')

@section('title', 'Blog with category page')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="div1 col-md-8">
                @if (Session::has('success'))
                    <p class="text-success">{{ Session::get('success') }}</p>
                @endif

                @foreach ($category[0]->blogs as $blog)
                    <div class="card m-3 blog-post">
                        <a href="{{ route('blog', $blog->id) }}">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                alt="{{ $blog->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-decoration-none">{{ $blog->title }}</h5>
                            <p class="card-text text-decoration-none">{{ $blog->excerpt }}</p>
                            <a href="{{ route('blog', $blog->id) }}" class="btn btn-primary">View Blog</a>
                        </div>
                        <div class="card-footer text-body-secondary text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <b>Category: {{ $blog->category->name }}</b>
                                Date: {{ $blog->created_at }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="div2 col-md-4">
                <div class="card category m-3">
                    <div class="card-body latest-blog">
                        <div class="card-head"><b>Latest Blogs</b></div>
                        <ul class="list-group ">
                            @foreach ($latest as $latestBlog)
                                <li class="list-group-item ">
                                    <a href="{{ route('blog', $latestBlog->id) }}" class="text-decoration-none">
                                        <img src="{{ asset('storage' . '/' . $latestBlog->image) }}" 
                                            alt="{{ $latestBlog->title }}" class="card-img-top"
                                            width="100px">{{ $latestBlog->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card category m-3">
                    <div class="card-body categories">
                        <div class="card-head"><b>Categories</b></div>
                        <ol class="list-group list-group-numbered">
                            @foreach ($catwblog as $category)
                                @if ($category->id == $category_id)
                                    <li class="list-group-item d-flex justify-content-between align-items-start ">
                                        <div class="ms-2 me-auto">
                                            <a href="{{ route('blog_with_category', $category->id) }}">
                                                <div class="fw-bold ">{{ $category->name }}</div>
                                            </a>
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ count($category->blogs) }}</span>
                                    </li>
                                @else
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <a href="{{ route('blog_with_category', $category->id) }}">
                                                <div class="fw-bold ">{{ $category->name }}</div>
                                            </a>
                                        </div>
                                        <span class="badge bg-primary  rounded-pill">{{ count($category->blogs) }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>

        </div>
    </div>
@endsection
