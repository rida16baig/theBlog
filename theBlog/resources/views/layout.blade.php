<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg  " style="background-color: black; color:white">
        <div class="container-fluid">
            <a class="navbar-brand" style="
            color: white; text-decoration:none" href="/">theBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item ">
                            <a style="
                            color: white; text-decoration:none"
                                href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                    @endauth
                </ul>
                <form class="d-flex" role="search">
                    @auth
                        <a style="
                        color: white; background-color: rgb(0, 179, 255)"
                            href="{{ route('logout') }}" class="btn btn-primary m-1">Logout</a>
                    @endauth
                    @guest
                        <a style="
                        color: white; background-color: rgb(0, 179, 255)"
                            href="{{ route('login') }}" class="btn btn-primary m-1">Login</a>
                        <a style="
                        color: white; background-color: rgb(0, 179, 255)"
                            href="{{ route('signup') }}" class="btn btn-primary m-1">Signup</a>
                    @endguest
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
