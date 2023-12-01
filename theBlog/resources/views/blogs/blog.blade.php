@extends('layout')

@section('title', 'Blog page')



@section('content')
    <div class="container col-6 mt-5">

        @if (Session::has('success'))
            <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        @foreach ($blog as $blog)
            <div class="card mt-5">
                <a>

                    <img  src="{{ asset('storage' . '/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-decoration-none">{{ $blog->title }}</h5>
                    <p class="card-text text-decoration-none">{{ $blog->excerpt }}</p>
                    <p class="card-text text-decoration-none">{{ $blog->body }}</p>
                </div>
                <div class="card-footer text-body-secondary text-decoration-none">
                    <div class="d-flex justify-content-between">
                        <b>Category : {{ $blog->category->name }}</b>
                        Date : {{ $blog->created_at }}
                    </div>
                </div>
            </div>
        @endforeach

        
    </div>
@endsection
