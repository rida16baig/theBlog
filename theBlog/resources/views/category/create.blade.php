@extends('layout')

@section('title', 'create category')

@section('content')
    <div class="container col-6 mt-5 card p-3 form">
        <h3 class="text-center card-header">Create Category</h3>
        <form action="{{ route('store_category') }}" class="card-body" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="form-group mb-3 ">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <input type="submit" value="Add Category" class="btn btn-primary mt-1">

        </form>
    </div>
@endsection
