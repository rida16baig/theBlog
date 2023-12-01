@extends('layout')

@section('title', 'Signup page')

@section('content')
@if (Session::has('msg'))
    <p class="text-center">{{Session::get('msg')}} !</p>
@endif
    <div class="container mt-5 col-6 card p-4 form">
        <h3 class="card-title ">Signup Form</h3>
        <form action="{{route('signup_post')}}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="username" class="mt-3">Username</label>
                <input type="text" name="username" id="username"  value="{{old('username')}}"class="form-control">
                @error('username')
                    <p style="color: red" >{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="mt-3">Email</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
                @error('email')
                    <p style="color: red" >{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="mt-3">Password</label>
                <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control">
                @error('password')
                    <p style="color: red" >{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="mt-3">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <p style="color: red" >{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="checkbox" name="check" id="check" class="mt-3">
                <label for="checkbox" class="mt-3">remember me</label>
            </div>

            <div class="form-group">
                <input type="submit" value="Signup" class="btn btn-primary mt-3 mb-3">
            </div>

            <div class="form_group">
                <a class="mt-3 link-primary link-underline-primary" href="{{route('login')}}">Already have an account?Login</a>
            </div>
        </form>
    </div>
@endsection
