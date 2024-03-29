<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>My Book</title>
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .navbar {
            background-color: #000;
            padding: 10px 20px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            width: 80px;
        }

        .navbar-brand {
            height: auto;
            display: flex;
            align-items: center;
        }

        .navbar-toggler {
            border: none;
            color: white;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-item {
            margin: 0 10px;
        }

        .nav-link {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
            width: 200px;
        }

        .dropdown-item a {
            color: #000;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: white;
        }

        .carousel-innerr {
            margin-top: 300px;
        }

        .carousel-inner img {
            filter: brightness(50%);
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
        }

        .carousel-inner h5,
        p {
            color: rgb(255, 255, 255);
        }

        .carousel-inner h5 {
            font-size: 90px;
        }

        .carousel-inner p {
            font-size: 30px;
        }

        .carousel-inner button {
            width: 200px;
            height: 50px;
        }

        .card {
            border: none;
            margin-bottom: 30px;
        }

        .card-img-top {
            width: 100%;
            height: auto;
        }

        .card-title {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
        }

        .shop-link {
            font-size: 1rem;
            color: #000;
            text-decoration: none;
        }

        .shop-link:hover {
            text-decoration: underline;
        }

        .card-body p {
            color: #000;
        }

        .carousel-innerr h5 {
            font-size: 50px;
            color: #000;
        }

        .carousel-innerr p {
            font-size: 20px;
        }

        #scrollToTop {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: opacity 0.3s ease-in-out;
        }

        #scrollToTop:hover {
            opacity: 0.8;
        }

        .navbar-nav .dropdown-menu {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
            padding: 10px;
            width: 200px;
        }

        .navbar-nav .dropdown-item a {
            text-decoration: none;
            color: #000;
            padding: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar-nav .dropdown-item:hover {
            background-color: #f0f0f0;
        }

        .navbar-nav .show>.nav-link::after {
            border-top-color: #fff;
        }

        .img-responsive {
            width: 300px;
            height: 480px;
        }

        .category-dropdown select {
            width: 100%;
            border: none;
            background-color: #000;
            color: white;
            padding: 7px;
        }

        #categorySelect:focus {
            border-color: #007bff;
        }

        .navbar-nav .dropdown .dropdown-toggle {
            background-color: #000;
            color: white;
            border: none;
            padding: 7px 20px;
        }

        .navbar-nav .dropdown .dropdown-menu {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #000000;
            width: 200px;
        }

        .navbar-nav .dropdown .dropdown-item a {
            text-decoration: none;
            color: #000;
            padding: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .navbar-nav .dropdown .dropdown-item:hover {
            background-color: #007bff;
        }

        .navbar-nav .show>.nav-link::after {
            border-top-color: #fff;
        }

        .logout-form button {
            background-color: transparent;
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px;
        }

        .logout-form button:hover {
            text-decoration: underline;
        }

        #billboard {
            margin-top: 50px;
        }

        .navbar-nav .nav-link,
        button {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    @if (\Session::has('success'))
        <script>
            Swal.fire(
                '',
                '{{ \Session::get('success') }}',
                'success'
            )
        </script>
    @endif

    @if (\Session::has('info'))
        <script>
            Swal.fire(
                '',
                '{{ \Session::get('info') }}',
                'info'
            )
        </script>
    @endif

    @if (\Session::has('error'))
        <script>
            Swal.fire(
                'Gabim!',
                '{{ \Session::get('error') }}',
                'error'
            )
        </script>
    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}"><img src="{{ asset('images/logo.png') }}"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex justify-content-center">
                    <ul class="navbar-nav">
                        @if (Auth::check() && Auth::user()->role == 1 or Auth::check() && Auth::user()->role == 2)
                            <li class="nav-item text-center">
                                <a class="nav-link active" aria-current="page" href="{{ route('kreu') }}">CONTROL
                                    PANEL</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <b>CATEGORY</b>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('cat.show', $category->id) }}">{{ $category->category }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item text-center">
                                <a class="nav-link" aria-current="page" href="{{ route('cat.index') }}">SHOP</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                            </li>
                        @endif

                    </ul>
                </div>
                <ul class="navbar-nav ms-3">
                    @if (Auth::check())
                        <li class="nav-item dropdown d-inline">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle d-flex align-items-center"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (Auth::user()->profile_photo)
                                        <div
                                            style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%; margin-right: 10px;">
                                            <img style="width: 100%; height: 100%; object-fit: cover;"
                                                src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                                alt="">
                                        </div>
                                    @endif
                                    <span class="text-center"
                                        style="font-weight: bold; color: #ffffff; flex-grow: 1;">ACCOUNT</span>
                                </button>
                                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                                    <li class="nav-item">
                                        <button type="submit" class="dropdown-item" style="text-decoration: none">
                                            <a href="{{ route('users.edit') }}" style="color: white">Settings</a>
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <form class="logout-form" action="{{ route('logout.index') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item"
                                                style="text-decoration: none; color: white">Log Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log In</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</body>

</html>
