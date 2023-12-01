@extends('layout')


@section('title', 'Create Blog Page')


@section('content')
    <div class="container col-6 mt-5 form">
        <h3 class="card-title text-center">Create Blog Post</h3>
        <form action="{{ Route('create_blog_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group m-3">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group m-3">
                <label for="image">Upload Image</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group m-3">
                <select class="form-select" name="category_id">
                    <option selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="create post" class="btn btn-primary m-3">
        </form>
    </div>
@endsection