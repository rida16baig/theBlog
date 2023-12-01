@extends('layout')

@section('title', 'all blogs page')



@section('content')
    <div class="container col-6 mt-5">
        <div class="card">
            <div class="card-body form">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Excerpt</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($blog as $blog)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><img class="img-thumbnail" width="200px"
                                        src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->excerpt }}</td>
                                <td>{{ $blog->category->name }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('edit_blog',$blog->id)}}">EDIT</a>
                                </td>
                                <td>
                                    <form action="{{route('delete_blog_post',$blog->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="DELETE" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
