@extends('layout')

@section('title', 'all blogs page')



@section('content')
    <div class="container col-6 mt-5">
        @if (Session::has('success'))
            <p class="text-success">{{ Session::get('success') }}</p>
        @endif
        <div class="card">
            <div class="card-body form">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($category as $category)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{route('edit_category', $category->id)}}" class="btn btn-warning">EDIT</a></td>
                                <td>
                                    <form action="{{route('delete_category', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <input class="btn btn-danger" value="DELETE" type="submit">
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
