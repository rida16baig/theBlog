@extends('layout')

@section('title', 'Login page')

@section('content')
    @if (Session::has('msg'))
        <p class="text-center" style="color:red;">{{ Session::get('msg') }} !</p>
    @endif
    <div class="container mt-5 col-6 card p-4 form">
        <h3 class="card-title ">Login Form</h3>
        <form action="{{ route('login_post') }}" method="post" >
            @csrf
            @method('post')
            <div class="form-group">
                <label for="username" class="mt-3">Username</label>
                <input type="text" name="username" id="username" class="form-control">
                @error('username')
                    <p style="color: red" class="text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="mt-3">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <p style="color: red" class="text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="checkbox" name="check" id="check" class="mt-3">
                <label for="checkbox" class="mt-3">remember me</label>
            </div>

            <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary mt-3 mb-3">
            </div>

            <div class="form_group">
                <a class="mt-3 link-primary link-underline-primary" href="{{ route('signup') }}">Not a user?Create
                    Account</a>
            </div>
        </form>
    </div>
@endsection
